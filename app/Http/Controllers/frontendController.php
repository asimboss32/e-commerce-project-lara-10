<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $products = product::get();
        return view('index', compact('products'));
    }
    public function product()
    {
        $products = product::get();
        return view('shop', compact('products'));
    }
  
    public function category($id)
    {
        $category = category::find($id);
        $products = product::where('cat_id', $id)->get();

        return view('category', compact('category', 'products'));
    }
    public function cart()
    {
        return view('viewcart');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function contact()
    {
        return view('contact');
    }

    public function test($id)
    {
        $products = product::with('colors', 'sizes','galleryImages','reviews')->where('id', $id)->first();
        return view('details', compact('products'));

      
    }
}
