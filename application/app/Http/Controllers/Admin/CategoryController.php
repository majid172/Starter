<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $pageTitle = 'Category List';
        $data['categories'] = Category::get();
        return view('admin.category.list',$data,compact('pageTitle'));
    }


   
    public function store(Request $request)
    {
        $request->validate([
            "category_name" => 'required|string',
            "description" => 'required|string'
        ]);
        $category = new Category();
        $category->name = $request->category_name;
        $category->description = $request->description;
        $category->save();
        return back()->with('success',"Add new category successfully");
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
