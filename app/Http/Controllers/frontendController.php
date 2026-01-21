<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function product()
    {
        return view('shop');
    }
    public function productDetails()
    {
        return view('details');
    }
    public function category()
    {
        return view('category');
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
}
