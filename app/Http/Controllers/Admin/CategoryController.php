<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function json()
    {
        $data = Category::dt()->search()->get();
        $recordsTotal = Category::count();
        $recordsFiltered = Category::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.categories.index');
    }


    public function create()
    {
		$category = new Category;
		return view('admin.categories.form', compact('category'));
	 }


    public function store()
    {
		Category::create(request()->all());
		return redirect('admin/categories#new');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }


    public function update(Category $category)
    {
        $category->update(request()->all());
        return redirect('admin/categories#edit');
    }


    public function destroy(Category $category)
    {
        $response = ['success' => false, 'error' => 'No se pueden borrar categorías que tienen productos asignados'];
        if (!$category->products()->count()) {
            $category->delete();
            $response = ['success' => true];
        }
        return $response;
    }
}