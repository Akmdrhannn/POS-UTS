<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = categories::all();
        return view('user.page_profile', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'username' => 'string|max:255|unique:' . users::class,
            'email' => 'string|email|unique:' . users::class . '|max:100',
            'password' => ['confirmed', Password::default()->sometimes()],
            'jenisKelamin' => 'required',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:13',
            'avatar' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        // dd($request->toArray());
        $penjual = users::find(Auth::user()->id);
        $penjual->first_name = $request->input('firstName');
        $penjual->last_name = $request->input('lastName');
        $penjual->no_hp = $request->input('telepon');
        $penjual->jenis_kelamin = $request->input('jenisKelamin');
        $penjual->alamat = $request->input('alamat');
        if ($request->avatar) {
            $imgUrl = time() . '-' . $request->username . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('user'), $imgUrl);
            $penjual->avatar = $imgUrl;
        }
        if ($request->password) {
            $penjual->password = Hash::make($request->input('password'));
        }
        $penjual->update();

        return back()->with('success', 'Berhasil mengubah informasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
