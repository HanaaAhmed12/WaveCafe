<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $title = 'Categories';
        return view('admin.categories', compact('categories', 'title'));
    }

    public function create()
    {
        $title = 'Add Category';
        return view('admin.addCategory', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }
    
    public function edit($id)
    {
        $title = 'Edit Category';
        $category = Category::find($id);
        return view('admin.editCategory', compact('category','title'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

    if ($category->beverages()->count() > 0) {
        return redirect()->route('categories.index')->with('error', 'Category has products. Delete not allowed.');
    }

    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
}
}
