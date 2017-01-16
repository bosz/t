<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Posts;
use App\Tags;
use App\Category;
use Auth;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
       
		$posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.posts.index')->withPosts($posts);
    }

    /**
     * @return mixed
     */
    public function create()
    {
      
	   $categories = Category::all();
        $tags = Tags::all();
        return view('backend.posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * @param Request $request
     * @param Posts $posts
     * @return mixed
     */
    public function store(Request $request,Posts $posts)
    {
        
		$this->validate($request, [
            'title' => 'unique:posts|max:255',
            'category' => 'required'
        ]);

        $day = $request->date;

        if(empty($request->date)){
           $day = date("m/d/y");
        }

        $posts->author = Auth::user()->name ;
        $posts->status =  $request->status;
        $posts->category = $request->category ;

        $posts->title = $request->title;
        $posts->slug = str_slug($request->title);
        $posts->content = $request->content;

        $posts->tags = $request->tags;
        $posts->date = $day;

        $posts->save();

        Session::flash('success', 'Successfully created new post!');

        return back();
    }
    

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        
		$categories = Category::all();
        $tags = Tags::all();
        $post = Posts::findOrFail($id);
        return view('backend.posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);

        if( $validator->fails() ) {
            return redirect()->back()->withErrors($validator);
        }

        $post = Posts::findOrFail($id);
        $post->fill($input)->save();
        Session::flash('success', 'Successfully updated the post!');
        return redirect()->route('posts.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id) 
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();

        Session::flash('success', 'Successfully deleted the post!');
        return redirect()->route('posts.index');
    }

    /**
     * @return mixed
     */
    public function postDeleteAll() 
    {
        Posts::truncate();
        Session::flash('success', 'Successfully deleted all the posts!');
        return redirect()->route('posts.index');
    }




}
