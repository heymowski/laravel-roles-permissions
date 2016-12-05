<?php

namespace Heymowski\RolesAndPermissions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Heymowski\RolesAndPermissions\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('RolesAndPermissions::permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = Permission::select('family')->groupBy('family')->pluck('family');

        return view('RolesAndPermissions::permission.create', compact('families'));
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
        $newPermission = new Permission;

        $name = strtolower($request->input('name'));
        $name = str_replace(' ', '_', $name);

        $newPermission->name = $name;
        $newPermission->label = $request->input('label');
        $newPermission->family = $request->input('family');
        $newPermission->save();

        return redirect(config('RolesAndPermissions.route_group_name').'/permission');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $families = Permission::select('family')->groupBy('family')->pluck('family');

        return view('RolesAndPermissions::permission.edit', compact('permission', 'families'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissionToUpdate = Permission::findOrFail($id);

        $name = strtolower($request->input('name'));
        $name = str_replace(' ', '_', $name);

        $permissionToUpdate->name = $name;
        $permissionToUpdate->label = $request->input('label');
        $permissionToUpdate->family = $request->input('family');
        $permissionToUpdate->save();

        return redirect(config('RolesAndPermissions.route_group_name').'/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        return redirect(config('RolesAndPermissions.route_group_name').'/permission');
    }
}
