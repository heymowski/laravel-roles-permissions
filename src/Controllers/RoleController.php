<?php

namespace Heymowski\RolesAndPermissions\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Heymowski\RolesAndPermissions\Models\Role;
use Heymowski\RolesAndPermissions\Models\Permission;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('RolesAndPermissions::role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::getByFamily();

        return view('RolesAndPermissions::role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRole = new Role();

        $newRole->name = str_slug($request->input('name'), '_');

        $newRole->label = $request->input('label');

        $newRole->save();

        $this->SyncPermissons($newRole, $request);

        return redirect(config('RolesAndPermissions.route_group_name').'/role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::getByFamily();

        return view('RolesAndPermissions::role.edit', compact('role', 'permissions'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int  $id
     *
     * @return \Illuminate\Http\Response
    */ 
    public function update(Request $request, $id)
    {
        $RoleToEdit = Role::findOrFail($id);

        $RoleToEdit->name = str_slug($request->input('name'), '_');

        $RoleToEdit->label = $request->input('label');

        $RoleToEdit->save();

        $this->SyncPermissons($RoleToEdit, $request);

        return redirect(config('RolesAndPermissions.route_group_name').'/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
    	$role->delete();
        
        return redirect(config('RolesAndPermissions.route_group_name').'/role');
    }

    /**
     *  SyncPermissons.
     */
    protected function SyncPermissons(Role $role, Request $request)
    {
        $permissionsToSync = [];

        if ($request->has('permissions')) {
            $permissionsToSync = $request->input('permissions');
        }

        $role->syncPermissions($permissionsToSync);
    }
}
