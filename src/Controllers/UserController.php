<?php

namespace Heymowski\RolesAndPermissions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Heymowski\RolesAndPermissions\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('RolesAndPermissions::user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    	$roles = Role::all();
    	return view('RolesAndPermissions::user.edit', compact('user', 'roles'));   
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
        $userToEdit = User::findOrFail($id);

        $rolesArrayToSync = [];

        if ($request->has('roles')) {
            $rolesArrayToSync = $request->input('roles');
        }
       
        $userToEdit->syncRoles($rolesArrayToSync);

        return redirect(config('RolesAndPermissions.route_group_name').'/user');
    }
}
