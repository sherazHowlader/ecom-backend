<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
       $categories = Category::all();
       return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        Category::create([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);

        toast('Category added success','success');
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        $category->update([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);

        toast('Category update success','success');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        toast('Category delete success','success');
        return redirect()->route('category.index');
    }

    public function statusToggle(Request $request)
    {
        $category = Category::findOrFail($request->category);

        $category->update([
            'status' => $request->status == true ? false : true,
        ]);
        toast('Category status change success','success');
        return response()->json($category);
    }
}
