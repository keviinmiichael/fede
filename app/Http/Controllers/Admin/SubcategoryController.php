<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subcategory;

class SubcategoryController extends Controller
{
	public function json()
	{
		$data = Subcategory::where('category_id', request('category_id'))->dt()->search()->get();
		$recordsTotal = Subcategory::where('category_id', request('category_id'))->count();
		$recordsFiltered = Subcategory::where('category_id', request('category_id'))->search()->count();
		return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index(\App\Category $category)
    {
		return view('admin.subcategories.index', compact('category'));
    }

	 public function create(\App\Category $category)
    {
		$subcategory = new Subcategory;
		return view('admin.subcategories.form', compact('subcategory', 'category'));
	}

    public function store()
    {
		Subcategory::create(request()->all());
		return redirect('admin/categories/'.request('category_id').'/subcategories#new');
    }

    public function edit(\App\Category $category, Subcategory $subcategory)
    {
        return view('admin.subcategories.form', compact('subcategory', 'category'));
    }


    public function update(\App\Category $category, Subcategory $subcategory)
    {
        $subcategory->update(request()->all());
        return redirect('admin/categories/'.$category->id.'/subcategories#new');
    }


    public function destroy(\App\Category $category, Subcategory $subcategory)
    {
        $response = ['success' => false, 'error' => 'No se pueden borrar subcategorías que tienen productos asignados'];
        if (!$subcategory->products()->count()) {
            $subcategory->delete();
            $response = ['success' => true];
        }
        return $response;
    }

    public function byCategory()
    {
        return Subcategory::toSelect(request('category_id'));
    }
}