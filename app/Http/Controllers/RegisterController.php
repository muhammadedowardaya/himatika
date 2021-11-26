<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return redirect('/login')->with('status', 'active');
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
        $user = new User();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:5|max:255',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('gagalRegistrasi', 'pesan.gagal("Registrasi gagal!")');
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
            // dd('gagal');
        } else {
            // dd('berhasil');
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'required|min:5|max:255',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
            return redirect('/login')->with('berhasilRegistrasi', 'pesan.berhasil("Registrasi berhasil, silakan login!")');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}