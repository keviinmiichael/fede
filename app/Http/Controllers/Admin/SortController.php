<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    public function __invoke($table)
    {
        for ($i=0, $l=count(request()->input('order')); $i<$l; $i++) {
            \DB::table($table)
                ->where('id', request()->input("id.$i"))
                ->update(['order' => request()->input("order.$i")])
            ;
        }
    }
}