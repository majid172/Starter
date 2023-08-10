<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $pageTitle = 'Product List';
        $categories = Category::where('status',1)->get();
        $products = Product::get();
        return view('admin.product.list',compact('pageTitle','products','categories'));
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'pr_name' =>'required|string',
            'price' => 'required|numeric',
            'catedory_id' => 'required',
            'stock_quantity' =>'required|numeric'
        ]);

        $product = new Product();
        $product->category_id=$request->category_id;
        $product->name = $request->pr_name;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->save();
        $notify = ['success','Product store successfully'];
        return back()->withNotify($notify);
    }
}
