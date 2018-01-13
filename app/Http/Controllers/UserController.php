<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::orderBy('id','desc')->paginate();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.add');
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
        $rules = [
            'name' => 'required|string|max:20',
            'email' => 'unique:users,email|string|max:64',
            'password' => 'required|string|min:6|confirmed',
        ];

        $this->validate($request,$rules);
        $user = new \App\User;
        $input = $request->except('password_confirmation');
        $input['password'] = bcrypt($input['password']);
        $user->create($input);

        session()->flash('class','alert alert-success');
        session()->flash('message','User Has Been Created!');

        return redirect()->route('users.index');
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
        $user = \App\User::find($id);
        return view('users.show',compact('user'));
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
        $user = \App\User::find($id);
        return view('users.edit',compact('user'));
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

        $rules = [
            'name' => 'required|string|max:20',
            'email' => 'unique|string|max:64',
        ];

        $this->validate($request,$rules);
        $user = \App\User::find($id);
        $input = $request->all();
        $user->update($input);

        // \App\User::whereId($id)->update([
        //     'name' => $request->name,
        // ]);

        return redirect()->route('users.index');
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
        $user = \App\User::destroy($id);
        // $user->delete();

        return redirect()->route('users.index');
    }
}
