<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Zone;

class ZoneController extends Controller
{
    public function json()
    {
        $data = Zone::dt()->search()->get();
        $recordsTotal = Zone::count();
        $recordsFiltered = Zone::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.zones.index');
    }


    public function create()
    {
		$zone = new Zone;
		return view('admin.zones.form', compact('zone'));
	 }


    public function store()
    {
		Zone::create(request()->all());
		return redirect('admin/zones#new');
    }

    public function edit(Zone $zone)
    {
        return view('admin.zones.form', compact('zone'));
    }


    public function update(Zone $zone)
    {
        $zone->update(request()->all());
        return redirect('admin/zones#edit');
    }


    public function destroy(Zone $zone)
    {
        $response = ['success' => true];
        return $response;
    }
}
