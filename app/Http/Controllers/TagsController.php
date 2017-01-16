<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tags;
use Validator;
use Session;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tags::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.tags.index')->withTags($tags);
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags|max:255'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $tag = new Tags;
        $tag->title = $request->title;
        $tag->save();

        Session::flash('success', 'Successfully created the tag!');
        return redirect()->route('tags.index');

    }

    public function edit($id)
    {
        $tag = Tags::findOrFail($id);
        return view('backend.tags.edit')->withTag($tag);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags|max:255'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();
        $tag = Tags::findOrFail($id);
        $tag->fill($input)->save();

        Session::flash('success', 'Successfully updated the tag!');
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tags::findOrFail($id);
        $tag->delete();

        Session::flash('success', 'Successfully deleted the tag!');
        return redirect()->route('tags.index');
    }

    public function tagsDeleteAll() 
    {
        Tags::truncate();
        Session::flash('success', 'Successfully deleted the all tags!');
        return redirect()->route('tags.index');
    }

    /**
     * method relatedTags
     * @param $name string
     * @return View
     */
    public function relatedTags($name)
    {
        if(!$name == ''){
            $tags = true;
            $query = Posts::query();
            $posts = $query->where('tags', 'like', '%'.$name.'%')->orderBy('id', 'desc')->paginate(15);

            return view('frontend.search.result',compact('posts','name','tags'));
        }
        
        return back();
    }
}
