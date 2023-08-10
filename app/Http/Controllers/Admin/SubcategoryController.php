<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CreateSubcategory;
use App\Http\Services\SubcategoryCreatorService;
use App\Http\Services\SubcategoryUpdateService;
use App\Http\Services\TogglerService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubcategoryController extends Controller
{
    public function index() : View
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('subcategories.form', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category_id'      => ['required', 'exists:categories,id'],
            'subcategory_name' => ['required'],
        ]);
        SubcategoryCreatorService::create($request);
        toast('Subcategory added success', 'success');
        return redirect()->route('subcategory.index');
    }

    public function edit(Subcategory $subcategory): View
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory): RedirectResponse
    {
        $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'category_name' => ['required'],
        ]);
        SubcategoryUpdateService::update($request, $subcategory);
        toast('Subcategory update success', 'success');
        return redirect()->route('subcategory.index');
    }

    public function destroy(Subcategory $subcategory): RedirectResponse
    {
        $subcategory->delete();
        toast('Subcategory delete success', 'success');
        return redirect()->route('subcategory.index');
    }

    public function statusToggle(Request $request): JsonResponse
    {
        $subcategory = Subcategory::findOrFail($request->category);
        TogglerService::toggle($request, $subcategory);
        toast('Subcategory status change success', 'success');
        return response()->json($subcategory);
    }
}
