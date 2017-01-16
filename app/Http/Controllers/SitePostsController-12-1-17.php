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
use App\Likes as Likes;
use Auth;
use DB;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class SitePostsController extends Controller
{
    /**
     * @param Request $request
     * @param Posts $posts
     * @return mixed
     */
    public function store(Request $request,Posts $posts)
    {
        
		
		$validator = Validator::make($request->all(), [
            'content' => 'required|min:60', 
        ], ['required' => "Tu l'as trop courte. Ici, c'est 60 caractères minimum.", 'min' => "Tu l'as trop courte. Ici, c'est 60 caractères minimum."]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
		
		/*$this->validate($request, [
            'title' => 'unique:posts|max:255|required',
        ]);*/

        $request['author'] = 'Anonymous';

        if(Auth::check() && $request->input('anonymous') == null){
            $request['author'] = Auth::user()->name;
        }


        if ($request['tags'] == "") {
            $tags = "";
            preg_match_all('/(^|\s)(#[a-z\d-]+)/', $request['content'], $tg);
            foreach ($tg[0] as $k => $v) {
                $tmp = trim($v);
                $tags .= substr($tmp, 1, strlen($tmp));
                if ($k == sizeof($tg[0]) - 1) {
                    continue;
                }
                $tags .= ",";
            }
            $request['tags'] = $tags;
        }

        $request['category'] = 'Stories';
        $request['status'] = 'Draft';
        $request['date'] =  date("m/d/y");

        $request['slug'] = str_slug($request->input('title'));

        Posts::create($request->all());

        Session::flash('success', 'Successfully created new post!');
        return redirect('/');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getNextPosts(Request $request){

        $new_offset = $request['offset'];
        $status = 'success';
        $message = '';

        if (isset($request['search'])) {
            $posts = Posts::orderBy('id','desc')
                        ->where(function($query) use ($request){
                            $searchArray = explode(',', json_decode($request->get('search')));
                            // echo json_encode($searchArray);
                            for ($i=0; $i < sizeof($searchArray); $i++) { 
                                $tmp = trim($searchArray[$i]); 
                                if ($tmp == "") {
                                    unset($searchArray[$i]);
                                    continue;
                                }
                                $searchArray[$i] = $tmp;
                            }
                            foreach ($searchArray as $key => $search) {
                                if (strpos($search, '#') !== false) {
                                    $query->orWhere('tags', 'like', '%'.substr($search, 1).'%');
                                }else{
                                    $query->orWhere('title', 'like', '%'.$search.'%')
                                    ->orWhere('slug', 'like', '%'.$search.'%')
                                    ->orWhere('author', 'like', '%'.$search.'%')
                                    ->orWhere('content', 'like', '%'.$search.'%')
                                    ->orWhere('category', 'like', '%'.$search.'%');
                                }
                            }
                        });
        }else{
            $posts = Posts::orderBy('id','desc');
        }

        $posts = $posts
                ->where('status', '!=', 'draft')
                ->where('category', '=', 'Stories')
                ->select(['posts.*', DB::raw('count(likes.post_id) as likes_count')])
                ->groupBy('posts.id')
                ->leftJoin('likes', 'likes.post_id', '=', 'posts.id')
                ->offset($new_offset)
                ->limit(10)
                ->get();


        if (count($posts) == 0) {
            $status = 'error';
            $message = 'Fin des posts';

            return response()->json([
                "status"=>$status,
                "message"=>$message,
                "search"=>urldecode($request->get('search'))
            ]);
        }

        foreach ($posts as $key => $post) {
            $myLike = Likes::where('post_id', '=', $post->id)->where('ip', '=', $request->ip())->first();
            $post->liked = $myLike == NULL ? false : true;
        }

        $allPosts = '';
        foreach(array_chunk($posts->all(), 3) as $post){
            $allPosts .= view('new-front.partials.posts', compact('post'))->render();
        }
        return response()->json([
            // "content"=>view('new-front.partials.posts')->with(['posts'=>$posts])->render(),
            "content"=>$allPosts,
            "status"=>$status,
            "message"=>$message,
            "offset"=>$new_offset
        ]);
       
    }



    /*top post next page*/
    public function topPostGetNextPosts(Request $request){

        $new_offset = $request['offset'];
        $status = 'success';
        $message = '';

        if (isset($request['search'])) {
            $posts = Posts::orderBy('likes_count','desc')
                        ->where(function($query) use ($request){
                            $searchArray = explode(',', json_decode($request->get('search')));
                            // echo json_encode($searchArray);
                            for ($i=0; $i < sizeof($searchArray); $i++) { 
                                $tmp = trim($searchArray[$i]); 
                                if ($tmp == "") {
                                    unset($searchArray[$i]);
                                    continue;
                                }
                                $searchArray[$i] = $tmp;
                            }
                            foreach ($searchArray as $key => $search) {
                                if (strpos($search, '#') !== false) {
                                    $query->orWhere('tags', 'like', '%'.substr($search, 1).'%');
                                }else{
                                    $query->orWhere('title', 'like', '%'.$search.'%')
                                    ->orWhere('slug', 'like', '%'.$search.'%')
                                    ->orWhere('author', 'like', '%'.$search.'%')
                                    ->orWhere('content', 'like', '%'.$search.'%')
                                    ->orWhere('category', 'like', '%'.$search.'%');
                                }
                            }
                        });
        }else{
            $posts = Posts::orderBy('likes_count','desc');
        }

        $posts = $posts
                ->where('status', '!=', 'draft')
                ->where('category', '=', 'Stories')
                ->select(['posts.*', DB::raw('count(likes.post_id) as likes_count')])
                ->groupBy('posts.id')
                ->leftJoin('likes', 'likes.post_id', '=', 'posts.id')
                ->offset($new_offset)
                ->limit(10)
                ->get();


        if (count($posts) == 0) {
            $status = 'error';
            $message = 'Fin des posts';

            return response()->json([
                "status"=>$status,
                "message"=>$message,
                "search"=>urldecode($request->get('search'))
            ]);
        }

        foreach ($posts as $key => $post) {
            $myLike = Likes::where('post_id', '=', $post->id)->where('ip', '=', $request->ip())->first();
            $post->liked = $myLike == NULL ? false : true;
        }

        $allPosts = '';
        foreach(array_chunk($posts->all(), 3) as $post){
            $allPosts .= view('new-front.partials.posts', compact('post'))->render();
        }
        return response()->json([
            // "content"=>view('new-front.partials.posts')->with(['posts'=>$posts])->render(),
            "content"=>$allPosts,
            "status"=>$status,
            "message"=>$message,
            "offset"=>$new_offset
        ]);
       
    }



    /**
     * method userCreatePost
     * @return  View
     */
    public function userCreatePost()
    {
        return view('new-front.pages.create-post');
    }

    /**
     * method search
     * @return View
     */
    public function search()
    {
        $name = $_GET['by'];

        if(!$name == ''){

            $query = Posts::query();

            if($name[0] == '#'){

                $name = trim(substr($name,1));

                $posts = $query->where('tags', 'like', '%'.$name.'%')->orderBy('id', 'desc')->get();

            }else{
                $posts = $query->where('title', 'like', '%'.$name.'%')->orWhere('content', 'like', "$name%")->orWhere('tags', 'like', "$name%")->orderBy('id', 'desc')->get();
            }

            return view('frontend.search.result',compact('posts','name'));
        }

        return back();
    }
    
}