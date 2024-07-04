<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::id();
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
{
    
    return view('categories.edit', compact('category'));
}

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category); // Authorize user to update category

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function show(Category $category, Request $request)
    {
        $search = $request->query('search');
        $query = $category->notes()->where('user_id', auth()->id());

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $notes = $query->get();
        return view('categories.show', compact('category', 'notes'));
    }

    public function destroy(Category $category)
    {
        // Remove authorization check
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    


}