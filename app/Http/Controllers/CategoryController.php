<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function list()
    {
        return view('category.list', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $cat = new Category();
        $cat->categoryStore($request);      

        return redirect()->route('category.list');
    }

    
    public function edit(Category $category)
    {

        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $cat = new Category();
        $cat->categoryUpdate($request, $category);

        return redirect()->route('category.list');
    }

    public function destroy(Category $category)
    {
        $category->getBook()->delete();
        $category->delete();
        return redirect()->route('category.list');
    }
}
