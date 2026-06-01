<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function categoryList()
    {
        $categories = category::get();
        return view('backend.category.category-list', compact('categories'));
    }
    public function categoryAdd()
    {
        return view('backend.category.category-add');
    }

    public function categoryStore(Request $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->slug = str($request->name)->slug();

        if(isset($request->image)){
           $imageName = rand().'-category-'.'.'.$request->image->extension(); // 85778-category-.jpg
           $request->image->move('backend/images/category',$imageName);

           $category->image = $imageName;
        }


        $category->save();
        return redirect('admin/category/list');
    }
    
    public function categoryEdit($slug)
    {
        $category = category::where('slug', $slug)->first();
        return view('backend.category.category-edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $slug)
    {
        $category = category::where('slug', $slug)->first();
        $category->name = $request->name;
        $category->slug = str($request->name)->slug();

        $category->update();
        return redirect('/category/list');
    }

    public function categoryDelete($slug)
    {
        $category = category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/admin/category/list');
    }
}
