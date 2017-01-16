<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.category.index')->withCategories($categories);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:category|max:255'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $category = new Category;
        $category->title = $request->title;
        $category->slug = str_slug($request->title);
        $category->save();

        Session::flash('success', 'Successfully created the category!');
        return redirect()->route('category.index');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit')->withCategory($category);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:category|max:255',
            'slug' => 'required|max:255'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();
        $category = Category::findOrFail($id);
        $category->fill($input)->save();

        Session::flash('success', 'Successfully updated the category!');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Successfully deleted the category!');
        return redirect()->route('category.index');
    }

    public function categoryDeleteAll() 
    {
        Category::truncate();
        Session::flash('success', 'Successfully deleted the all categories!');
        return redirect()->route('category.index');
    }
}
