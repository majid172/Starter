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

    public function 
}
