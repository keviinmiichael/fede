<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subzone;

class SubzoneController extends Controller
{
	public function json()
	{
		$data = Subzone::where('zone_id', request('zone_id'))->dt()->search()->get();
		$recordsTotal = Subzone::where('zone_id', request('zone_id'))->count();
		$recordsFiltered = Subzone::where('zone_id', request('zone_id'))->search()->count();
		return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index(\App\Zone $zone)
    {
		return view('admin.subzones.index', compact('zone'));
    }

	 public function create(\App\Zone $zone)
    {
		$subzone = new Subzone;
		return view('admin.subzones.form', compact('subzone', 'zone'));
	}

    public function store()
    {
		Subzone::create(request()->all());
		return redirect('admin/zones/'.request('zone_id').'/subzones#new');
    }

    public function edit(\App\Zone $zone, Subzone $subzone)
    {
        return view('admin.subzones.form', compact('subzone', 'zone'));
    }


    public function update(\App\Zone $zone, Subzone $subzone)
    {
        $subzone->update(request()->all());
        return redirect('admin/zones/'.$zone->id.'/subzones#edit');
    }


    public function destroy(\App\Zone $zone, Subzone $subzone)
    {
        $subzone->delete();
        return ['success' => true];
    }

    public function byZone()
    {
        return Subzone::toSelect(request('zone_id'));
    }
}
