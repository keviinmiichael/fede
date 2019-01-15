<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Item;
use App\Purchase;
use App\Product;
use App\Client;

class PurchaseController extends Controller
{

	public function json()
	{
		$data = Purchase::dt()->search()->get();
		$recordsTotal = Purchase::count();
		$recordsFiltered = Purchase::search()->count();
		return compact('data', 'recordsTotal', 'recordsFiltered');
	}

    public function index()
    {
		return view('admin.purchases.index');
    }

    public function show(Purchase $purchase)
    {
        return view('admin.purchases.show', compact('purchase'));
    }

    public function create()
    {
        $codesAutocomplete = \App\Product::select(\DB::raw('products.*, code as label'))->orderBy('code')->get();
        $namesAutocomplete = \App\Product::select(\DB::raw('products.*, name as label'))->orderBy('name')->get();
        $purchase = new Purchase;
        return view('admin.purchases.form', compact('purchase', 'codesAutocomplete', 'namesAutocomplete'));
    }

    public function store()
    {
        // return 'bien';
		$products = Product::whereIn('id', request()->input('product_id'))->get();
		$itemsCollection = collect();
		$totalPurchase = 0;
		$totalCost = 0;
		foreach ($products as $key => $product) {
            $qty = request()->input("amount.$key") *1;
			$itemsCollection->push($this->create_item($product,$qty));
			$totalPurchase += request()->input("total.$key")*1;
			$totalCost += $product->cost * $qty ;
        }

		if (request()->input('client_type') == 1) {
			$client = Client::find(request()->input("client_id"));
		}else{
			$client = request()->input("client");
		}

		$discount = request()->input('discount');

		$purchase = Purchase::create([

				'total' => $discount!=''? $totalPurchase * (1-($discount*1/100)):$totalPurchase,
				'cost' =>$totalCost,
	            'client_id' => is_object($client) ? $client->id: NULL,
	            'client_fullname' => !is_object($client) ? $client: NULL,
		]);

		$purchase->items()->saveMany($itemsCollection);


        return redirect('admin/purchases#new');
    }

	private function create_item($cartItem,$qty)
    {
            $item = new \App\Item;
            $item->product_id = $cartItem->id;
            $item->price = $cartItem->price?$cartItem->price:$cartItem->cost;
            $item->cost = $cartItem->cost;
            $item->name = $cartItem->name;
            $item->amount = $qty;

		return $item;
    }

    public function update(Purchase $purchase)
    {
        $purchase->update(request()->all());
        if (request()->ajax()) return $purchase->toArray();
        return redirect('admin/purchase#edit');
    }

	public function toPDF(Purchase $purchase)
    {
        $pdf = \PDF::loadView('admin.purchases.pdf', compact('purchase'));
        return $pdf->stream();
    }

	public function toExcel()
    {
        $date = Carbon::now()->month;
        // return Excel::download(new PurchasesExport, 'invoices.xlsx');
        \Excel::create('Compras-mes-'.$date, function($excel) use ($date){
            $excel->sheet('Compras-'.$date,function($sheet) use ($date){
                $sheet->row(1,['N°','Fecha','Nombre','Email','Teléfono','Costo','Total','Estado']);

                //Data
                $start = new Carbon('first day of last month');
                $end = new Carbon('last day of last month');
                $compras = Purchase::with('client')->whereBetween('created_at',[$start,$end])->get();
                //$compras = Purchase::with('client')->get();

                foreach ($compras as $compra) {
                    $row=[];
                    $row[] = $compra->id;
                    $row[] = $compra->created_at->format('d-m-Y');
                    $row[] = $compra->client->name;
                    $row[] = $compra->client->email;
                    $row[] = $compra->client->phone;
                    $row[] = $compra->cost;
                    $row[] = $compra->total;
                    $row[] = $compra->paymentStatus->value;
                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }

    public function destroy(Purchase $purchase)
    {
        foreach ($purchase->items as $item) {
            \App\Stock::where('product_id', $item->product_id)->increment('amount', $item->amount);
        }
        $purchase->items()->delete();
        $purchase->delete();
        return ['success' => true];
    }

    public function itemsToJson()
    {
        $data = Item::where('purchase_id', request()->input('purchase_id'))->dt()->search()->get();
        $recordsTotal = Item::where('purchase_id', request()->input('purchase_id'))->count();
        $recordsFiltered = Item::where('purchase_id', request()->input('purchase_id'))->search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }
}
