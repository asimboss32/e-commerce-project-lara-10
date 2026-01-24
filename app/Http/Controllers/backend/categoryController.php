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

        $category->save();
        return redirect('/category/list');
    }
    
    public function categoryEdit($id)
    {
        $category = category::find($id);
        return view('backend.category.category-edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = category::find($id);
        $category->name = $request->name;
        $category->slug = str($request->name)->slug();

        $category->update();
        return redirect('/category/list');
    }

    public function categoryDelete($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('/category/list');
    }
}
