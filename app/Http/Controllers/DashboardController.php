<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Category;
use App\Tags;
use App\User;
use Schema;
use Artisan;
use Session;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$posts = Posts::orderBy('created_at', 'desc')->paginate(5);
    	$latest = Posts::orderBy('created_at', 'desc')->first();
    	$post_count = Posts::all()->count();
    	$categories = Category::all();
    	$tags = Tags::all();
    	$user = User::where('role',1)->get();
    	$data = [
    		'posts' => $posts,
    		'latest' => $latest,
    		'post_count' => $post_count,
    		'categories' => $categories,
    		'tags' => $tags,
    		'user' => $user
    	];
        return view('backend.dashboard', $data);
    }

    public function login() 
    {
    	return view('backend.login');
    }

    public function setup() 
    {
        if (Schema::hasTable('users')) {
            Session::flash('error', 'You are already installed the application. Please log in!');
            return redirect()->route('login');
        }

        if(!DB::connection()) {
           Session::flash('error', 'No database connection avilable! Please configure a MySQL database in .env file.');
        } else {
            Session::flash('success', 'Available a database connection. You are ready now for run the installation!');
        }

        return view('backend.setup');
    }

    public function install()
    {
        if (Schema::hasTable('users')) {
            Session::flash('error', 'You are already installed the application. Please log in!');
            return redirect()->route('login');
        }

        Artisan::call('migrate');
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

        Session::flash('success', 'Successfully installed the application. Please log in!');
        return redirect()->route('login');
    }
}
