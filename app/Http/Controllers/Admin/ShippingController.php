<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Purchase;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        return view('admin.shipping.index');
    }

    public function toPDF(Purchase $purchase)
    {
        $pdf = \PDF::loadView('admin.shipping.pdf', compact('purchase'));
        return $pdf->stream();
    }
}
