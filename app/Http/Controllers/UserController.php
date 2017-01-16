<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Session;
use Hash;

class UserController extends Controller
{
    /**
     * @return mixed
     */
    public function index() 
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.user.index')->withUsers($users);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success', 'Successfully created the user!');
        return redirect()->route('user.index');

    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit')->withUser($user);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required'
        ]);



        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success', 'Successfully updated the user!');
        return redirect()->route('user.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', 'Successfully deleted the all users!');
        return redirect()->route('user.index');
    }
}
