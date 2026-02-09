<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
    //cart
    public function addToCart( Request $request, $id){
        $cartProduct = Cart::where('ip_address', $request->ip())->where('product_id', $id)->orderBy('id', 'desc')->first();
        $product = product::find($id);

       if($cartProduct == null){
         $cart = new Cart();
        $cart->ip_address = $request->ip();
        $cart->product_id = $product->id;
        $cart->quantity = 1;
      
       if($product->discount_price == null){
        $cart->price = $product->regular_price;
    } 
    
    elseif($product->discount_price != null){
        $cart->price = $product->discount_price;
    }
        $cart->save();

         }
      elseif($cartProduct != null){
        $cartProduct->quantity = $cartProduct->quantity + 1;
        $cartProduct->save();
      }
        return redirect()->back();
       }
    
       public function addToCartDetails(Request $request, $id){
        $cartProduct = Cart::where('ip_address', $request->ip())->where('product_id', $id)->orderBy('id', 'desc')->first();
        $product = product::find($id);

       if($cartProduct == null){
         $cart = new Cart();
        $cart->ip_address = $request->ip();
        $cart->product_id = $product->id;
        $cart->size = $request->size;
        $cart->color = $request->color;
        $cart->quantity = 1;
      
       if($product->discount_price == null){
        $cart->price = $product->regular_price;
    } 
    
    elseif($product->discount_price != null){
        $cart->price = $product->discount_price;
    }
        $cart->save();

         }
      elseif($cartProduct != null){
        $cartProduct->quantity = $cartProduct->quantity + $request->quantity; ;
        $cartProduct->size = $request->size;
        $cartProduct->color = $request->color;
        $cartProduct->save();
      }
       if($request->action == "add-to-cart"){
        return redirect()->back();
       }
       elseif($request->action == "buy_now"){
        return redirect('/checkout');
       }
       
       }

         public function removeFromCart($id){
          $cartProduct = Cart::find($id);
          $cartProduct->delete();
          return redirect()->back();
         }

}
