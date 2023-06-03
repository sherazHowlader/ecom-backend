<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
       $subcategories = Subcategory::all();
       return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.form' , compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => ['required','exists:categories,id'],
            'subcategory_name'  => ['required'],
        ]);
        Subcategory::create([
            'category_id'  => $request->category_id,
            'name'         => $request->subcategory_name,
            'slug'         => Str::slug($request->subcategory_name),
        ]);

        toast('Subcategory added success','success');
        return redirect()->route('subcategory.index');
    }

    public function show(Subcategory $subcategory)
    {
        //
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('categories','subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id'   => ['required','exists:categories,id'],
            'category_name' => ['required'],
        ]);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name'        => $request->category_name,
            'slug'        => Str::slug($request->category_name),
        ]);

        toast('Subcategory update success','success');
        return redirect()->route('subcategory.index');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        toast('Subcategory delete success','success');
        return redirect()->route('subcategory.index');
    }

    public function statusToggle(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->category);

        $subcategory->update([
            'status' => $request->status == true ? false : true,
        ]);
        toast('Subcategory status change success','success');
        return response()->json($subcategory);
    }
}
