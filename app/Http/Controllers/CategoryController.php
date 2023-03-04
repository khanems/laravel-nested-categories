<?php

namespace App\Http\Controllers;
require_once app_path('Helpers/CategoryHelper.php');
use Illuminate\Http\Request;
use App\Models\categories;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = categories::with('children')->with('parent')->get();

        return view('index', compact('categories'));
    }

    public function create()
    {
        $categories = categories::whereNull('parent_id')->get();

        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = categories::create($request->all());

        return redirect('/')->with('success', 'Category created successfully.');
    }




    public function edit($id)
    {
    $category = categories::findOrFail($id);
    $categories = categories::where('id', '<>', $id)->get();

    return view('edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|exists:categories,id',
    ]);

    $category = categories::findOrFail($id);

    $category->name = $request->input('name');
    $category->description = $request->input('description');
    $category->parent_id = $request->input('parent_id');

    $category->save();

    return redirect('/');
}

    public function destroy(categories $category)
    {
        $category->delete();

        return redirect()->route('index')->with('success', 'Category deleted successfully.');
    }
}
