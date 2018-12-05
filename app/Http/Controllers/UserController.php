<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
        return view('user.list',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required' , 
            'nik' => 'required',
            'username' => 'required' , 
            'password' => 'required' , 
            'user_role' => 'required'
            ]);

       $user = user::create([
        'nama' => $request->nama,
        'nik'=> $request->nik,
        'username'=> $request->username,
        'password' => $request->password,
        'user_role' => $request->user_role
        ]);

        $user = user::all();
        return view('user.list',['users'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('user.view',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',['user'=>$user]);
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
        $this->validate($request, [
            'nama' => 'required' , 
            'nik' => 'required',
            'username' => 'required' , 
            'password' => 'required' , 
            'user_role' => 'required' , 
            ]);

            $user->nama = $request->nama;
            $user->nik = $request->nik;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->user_role = $request->user_role;
            $user->save();

            $user = user::all();
            return view('user.list',['users'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user->delete();
        $user = user::all();
        return view('user.list',['users'=>$user]);
    }
}
