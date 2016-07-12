<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Laracasts\Flash\Flash;

use App\Role;

use DB;




use App\Role_User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        $roles = Role::all();
        $options = array('default' => 'Select a role');

        foreach ($roles as $role => $value) {
            $options += array($value->id => $value->display_name);
        }

        return view('admin.users.index')->with('users', $users)->with('roles', $options);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user = new User;
         $user -> name = $request->name;
         $user -> email = $request->email;
         $user -> password = bcrypt($request->password);
         $user->save();
         $user->attachRole(Role::findOrFail($request->role));
         Flash::success('New user created' . ' ' . $user->email);
         return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $user->book;
        //echo $user->book;
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_role = Role_User::where('user_id', $user->id)->first();
        $roles = Role::where('id', '!=', $user_role->role_id)->get();

        $role_name = Role::where('id', $user_role->role_id)->get();

        return view('admin.users.edit')->with('user', $user)->with('roles', $roles)->with('role_name', $role_name);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        $role_to_change = Role_User::where('user_id', $user->id)->update(array('role_id' => $request->role));;
        $user->save();

        Flash::success('The user has been edited' . ' ' . $user->email);

        return redirect()->route('admin.users.index');


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

    public function profile(Request $request)
    {
        $user = $request->user();
        $user -> book;
        return view('users.profile')->with('user', $user);
    }
}
