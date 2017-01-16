<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Posts;
use Validator;
use Session;
use App\User;
use App\Likes as Likes;
use Hash;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * @return mixed
     */
    public function login()
    {
        if(Auth::check() && Auth::user()->isAdmin() == 1) {
            return redirect()->route('dashboard.index');
        }

        // return view('frontend.pages.login');
        $tags = Tags::orderByRaw("RAND()")->limit(10)->get();
        return view('new-front.pages.login-signup', compact('tags'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('success', 'Successfully logged in!');
            return redirect()->intended('dashboard');
        } else {
            Session::flash('error', 'Invalid login credentials!');
            return redirect()->back();
        }
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();

        Session::flash('success', 'Successfully logged out!');
        return redirect()->route('login');
    }

    /**
     * @return mixed
     */
    public function home(Request $request)
    {
        if ($request->has('search')) {
            $posts = Posts::orderBy('id','desc')
                        ->where(function($query) use ($request){
                            $searchArray = explode(',', $request->get('search'));
                            for ($i=0; $i < sizeof($searchArray); $i++) { 
                                $tmp = trim($searchArray[$i]); 
                                if ($tmp == "") {
                                    unset($searchArray[$i]);
                                    continue;
                                }
                                $searchArray[$i] = $tmp;
                            }
                            // echo "<pre>"; var_dump($searchArray); die();
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
                ->where('category', '=', 'Stories')
                ->where('status', '!=', 'draft')
                ->select(['posts.*', DB::raw('count(likes.post_id) as likes_count')])
                ->groupBy('posts.id')
                ->leftJoin('likes', 'likes.post_id', '=', 'posts.id')
                // ->count(); 
                ->paginate(10);
                // ->get();
        foreach ($posts as $key => $post) {
            $myLike = Likes::where('post_id', '=', $post->id)->where('ip', '=', $request->ip())->first();
            $post->liked = $myLike == NULL ? false : true;
        }

        if (sizeof($posts) == 0) {
            if($request->has('search')){
                return redirect()->to('/xxx?search='.urlencode($request->get('search')));
            }else{
                return redirect()->to('/xxx');
            }
        }
        $newestPosts = Posts::where('created_at', '>', Carbon::now()->addDays(-7))->get();
        $tags = Tags::orderByRaw("RAND()")->/*limit(10)->*/get();

        return view('new-front.pages.home',compact('posts','tags', 'newestPosts'));
    }


    /*Top Stories*/
    public function top_posts(Request $request)
    {
        if ($request->has('search')) {
            $posts = Posts::orderBy('likes_count','desc')
                        ->where(function($query) use ($request){
                            $searchArray = explode(',', $request->get('search'));
                            for ($i=0; $i < sizeof($searchArray); $i++) { 
                                $tmp = trim($searchArray[$i]); 
                                if ($tmp == "") {
                                    unset($searchArray[$i]);
                                    continue;
                                }
                                $searchArray[$i] = $tmp;
                            }
                            // echo "<pre>"; var_dump($searchArray); die();
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
                ->where('category', '=', 'Stories')
                ->where('status', '!=', 'draft')
                ->select(['posts.*', DB::raw('count(likes.post_id) as likes_count')])
                ->groupBy('posts.id')
                ->leftJoin('likes', 'likes.post_id', '=', 'posts.id')
                // ->count(); 
                ->paginate(10);
                // ->get();
        foreach ($posts as $key => $post) {
            $myLike = Likes::where('post_id', '=', $post->id)->where('ip', '=', $request->ip())->first();
            $post->liked = $myLike == NULL ? false : true;
        }

        if (sizeof($posts) == 0) {
            if($request->has('search')){
                return redirect()->to('/xxx?search='.urlencode($request->get('search')));
            }else{
                return redirect()->to('/xxx');
            }
        }
        $newestPosts = Posts::where('created_at', '>', Carbon::now()->addDays(-7))->get();
        $tags = Tags::orderByRaw("RAND()")->/*limit(10)->*/get();

        return view('new-front.pages.home',compact('posts','tags', 'newestPosts'));
    }

    /**
     * @return mixed
     */
    public function latest()
    {  
        $posts = Posts::where('status', 'public')->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.pages.latest')->withPosts($posts);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function single($id)
    {
        $post = Posts::findOrFail($id);

        $blogKey = 'blog_' . $id;

        if (!Session::has($blogKey)) {
            Posts::where('id',$id)->increment('count', 1);
            Session::put($blogKey, 1);
        }



        return view('frontend.pages.single')->withPost($post);
    }
}
