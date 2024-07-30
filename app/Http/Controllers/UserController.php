<?php

namespace App\Http\Controllers;

use App\Http\Requests\userValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $users = User::paginate(5);
        $search = $request->search;
        if ($search) {
            $users = User::where('first_name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->paginate(5);
        }
        return view('welcome', ['users' => $users, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userValidation $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $image = $request->file('image');

        if ($image) {
            $img_name = time() . rand(10000, 99999) . $request->image->getClientOriginalName();
            $image->move('images/', $img_name);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->image = isset($img_name) ? $img_name : null;
        $user->save();
        return redirect("user/list")->with('success', 'User Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $user = User::find($id);
        return view('view', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $user = User::find($id);
        return view('edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $user = User::find($id);
        $image = $request->file('image');

        if ($image) {
            if (file_exists($user->image)) {
                unlink($user->image);
            }
            $img_name = time() . rand(10000, 99999) . $request->image->getClientOriginalName();
            $image->move('images/', $img_name);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->image = isset($img_name) ? $img_name : $user->image;
        $user->update();
        return redirect("user/list")->with('success', 'User Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $user = User::find($id)->delete();
        return redirect("user/list")->with('success', 'User Successfully Deleted');
    }

    public function userDetails()
    {
        $user = Auth::user();
        dd($user);
        // return view('view', ['user' => $user]);
    }
}
