<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\color;
use App\Models\galleryImage;
use App\Models\product;
use App\Models\review;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class productController extends Controller
{
    public function productList()
    {
        $products = product::with('category')->get();
        return view('backend.product.product-list',compact('products'));
    }
    public function productAdd( )
    {
        $categories = category::get();
       return view('backend.product.product-add',compact('categories'));
    }

    public function productStore(Request $request) 
    {
         $product = new product();

        if(isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension(); // 85778-product-.jpg
            $request->image->move('backend/images/product',$imageName);
 
            $product->image = $imageName;

        }
        $product->name = $request->name;
        $product->slug = str::slug($request->name);
        $product->sku_code = $request->sku_code;
        $product->cat_id = $request->cat_id;
        $product->quantity = $request->qty;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->discount_percentage = $request->discount_percentage;
        $product->description = $request->description;

        $product->save();

// color upload
      if(isset($request->color) && $request->color[0] != null) { // to check array is not empty // er mane formta theke jodi kono data na ashe tahole kaj korbe na
          foreach($request->color as $color_name){        //-> loop through each color name // akadhik color thakte pare tai loop kore nichi
            $color = new color();
            $color->product_id = $product->id;  //je product e color gulo jorito hobe tar id
            $color->color_name = $color_name;
            $color->save();
        }
      }
// size upload
     if(isset($request->size) && $request->size[0] != null) {
          foreach($request->size as $size_name){
            $size = new size();
            $size->product_id = $product->id;
            $size->size = $size_name;
            $size->save();
        }
      }
///gallery image upload
     if (isset($request->galleryImage)){
        foreach($request->galleryImage as $gallery_image){

            $gallery = new galleryImage();

            $gallery->product_id = $product->id;

            $imageName = rand().'-gallery-'.'.'.$gallery_image->extension(); // 85778-gallery-.jpg
            $gallery_image->move('backend/images/galleryImage',$imageName);

            $gallery->image = $imageName;
            $gallery->save();
        }

       
    }
     return redirect('/product/list');

}

public function productDelete($id)
    {
        $product = product::find($id);
        $colors = color::where('product_id', $id)->get();
        $sizes = size::where('product_id', $id)->get();
        $galleryImages = galleryImage::where('product_id', $id)->get();
        $reviews = review::where('product_id', $id)->get();

         if($product->image && file_exists('backend/images/product/'.$product->image)){
            unlink('backend/images/product/'.$product->image);
        }

        $product->delete();

        // delete colors
        if($colors->isNotEmpty()){
            foreach($colors as $color){
                $color->delete();
            }
        }
        // delete sizes
        if($sizes->isNotEmpty()){
            foreach($sizes as $size){
                $size->delete();
            }
        }
        // delete reviews
        if($reviews->isNotEmpty()){
            foreach($reviews as $review){
                $review->delete();
            }
        }

        // delete gallery images
        if($galleryImages->isNotEmpty()){
            foreach($galleryImages as $galleryImage){

                if($galleryImage->image && file_exists('backend/images/galleryImage/'.$galleryImage->image)){
                    unlink('backend/images/galleryImage/'.$galleryImage->image);
                }
                $galleryImage->delete();
            }
        }

        return redirect()->back();
    }


    // update product
    public function productEdit($id)
    {
        $product = product::where('id', $id)->with('colors','sizes','galleryImages')->first();
        $categories = category::get();
        return view('backend.product.product-edit', compact('product','categories'));
    }

    public function productUpdate(Request $request, $id)
    {
        $product = product::find($id);

        if(isset($request->image)){
            if($product->image && file_exists('backend/images/product/'.$product->image)){
                unlink('backend/images/product/'.$product->image);
            }
            $imageName = rand().'-product-'.'.'.$request->image->extension(); // 85778-product-.jpg
            $request->image->move('backend/images/product',$imageName);

            $product->image = $imageName;
        }

        if(isset($request->galleryImages)){
            // delete old gallery images
            $oldGalleryImages = galleryImage::where('product_id', $id)->get();
            if($oldGalleryImages->isNotEmpty()){
                foreach($oldGalleryImages as $oldGalleryImage){
                    if($oldGalleryImage->image && file_exists('backend/images/galleryImage/'.$oldGalleryImage->image)){
                        unlink('backend/images/galleryImage/'.$oldGalleryImage->image);
                    }
                    $oldGalleryImage->delete();
                }
                 // upload new gallery images
            foreach($request->galleryImages as $gallery_image){
                $gallery = new galleryImage();
                $gallery->product_id = $product->id;

                $imageName = rand().'-gallery-'.'.'.$gallery_image->extension(); // 85778-gallery-.jpg
                $gallery_image->move('backend/images/galleryImage',$imageName);

                $gallery->image = $imageName;
                $gallery->save();
            }
            }
           
        }

        //color

        if(isset($request->color) && $request->color[0] != null) {
            // delete old colors
            $oldColors = color::where('product_id', $id)->get();
            if($oldColors->isNotEmpty()){
                foreach($oldColors as $oldColor){
                    $oldColor->delete();
                }
            }
            // upload new colors
            foreach($request->color as $color_name){
                $color = new color();
                $color->product_id = $product->id;
                $color->color_name = $color_name;
                $color->save();
            }
        }

        // size
        if(isset($request->size) && $request->size[0] != null) {
            // delete old sizes
            $oldSizes = size::where('product_id', $id)->get();
            if($oldSizes->isNotEmpty()){
                foreach($oldSizes as $oldSize){
                    $oldSize->delete();
                }
            }
            // upload new sizes
            foreach($request->size as $size_name){
                $size = new size();
                $size->product_id = $product->id;
                $size->size = $size_name;
                $size->save();
            }
        }
        $product->name = $request->name;
        $product->slug = str::slug($request->name);
        $product->sku_code = $request->sku_code;
        $product->cat_id = $request->cat_id;
        $product->quantity = $request->qty;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->discount_percentage = $request->discount_percentage;
        $product->description = $request->description;
        $product->save();

        return redirect('/product/list');
    }

}