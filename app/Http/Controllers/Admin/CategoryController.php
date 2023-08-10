<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\TogglerService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        Category::create([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);

        toast('Category added success', 'success');
        return redirect()->route('category.index');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        $category->update([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);

        toast('Category update success', 'success');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        toast('Category delete success', 'success');
        return redirect()->route('category.index');
    }

    public function statusToggle(Request $request): JsonResponse
    {
        $category = Category::findOrFail($request->category);
        TogglerService::toggle($request, $category);
        toast('Category status change success', 'success');
        return response()->json($category);
    }
}
