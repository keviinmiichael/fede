<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Client;


class ClientController extends Controller
{
    public function toCSV()
    {
        $date = Carbon::now()->month;
        \Excel::create('Clientes'.$date, function($excel) use ($date){
            $excel->sheet('Clientes'.$date,function($sheet) use ($date){
                $sheet->row(1,['Nombre','Email']);

                //Data
                $start = new Carbon('first day of last month');
                $end = new Carbon('last day of last month');
                $clientes = Client::all();
                //$compras = Purchase::with('client')->get();

                foreach ($clientes as $cliente) {
                    $row=[];
                    $row[] = $cliente->name;
                    $row[] = $cliente->email;
                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }
}
