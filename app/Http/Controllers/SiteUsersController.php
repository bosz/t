<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Validator;
use Session;

/**
 * Class SiteUsersController
 * @package App\Http\Controllers
 */
class SiteUsersController extends Controller
{
    /**
     * SiteUsersController constructor.
     */
    public function __construct()
    {

    }
    
    /**
     * method register
     * @return View
     */
    public function register()
    {
        return view('frontend.authorize.register');
    }

    /**
     * method registerAccount
     * @param Request $request
     */
    public function registerAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|required|max:255|unique:users',
            'password' => 'required|max:255|',
            'gender'=>'required',
            'age'=>'required|numeric'
        ]);

        $request['password'] = Hash::make($request['password']);
        $request['role'] = 2;


        User::create($request->all());

        Session::flash('success', 'Success: account created!');

        return redirect('users/login');
    }

    /**
     * method login
     * @return View
     */
    public function login()
    {
        return view('frontend.authorize.login');
    }

    /**
     * method loginAccount
     * @param Request $request
     * @return View
     */
    public function loginAccount(Request $request){

        $this->validate($request, [
            'email' => 'email|required|max:255',
            'password' => 'required|max:255',
        ]);



        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        Auth::attempt([$field=>$request->get('email'),'password'=>$request->get('password'),'role'=>'2']);

        if (Auth::check()) {
            Session::flash('success', 'Success: You are Logged in');
            return redirect('/');
        }

        Session::flash('error', 'Error: Email/Password wrong');

        return back();
    }
    
}