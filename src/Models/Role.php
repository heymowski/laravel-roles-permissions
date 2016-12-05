<?php

namespace Heymowski\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Model;
use Heymowski\RolesAndPermissions\Models\Permission;

class Role extends Model
{
    /**
     * Fillable Fileds.
     *
     * @var [type]
     */
    protected $fillable = ['name', 'label'];

    /**
     * Permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();;
    }

    /**
     *  getPermissionsLabels.
     */
    public function getPermissionsLabels()
    {
        return $this->permissions->pluck('label');
    }

    /**
     *  checkIfRoleHasPermission.
     */
    public function checkIfRoleHasPermission($permissionId)
    {
        $permissionsIdList = $this->permissions->pluck('id')->toArray();

        if (in_array($permissionId, $permissionsIdList)) {
            return true;
        }

        return false;
    }

    /**
     *  syncPermissions.
     */
    public function syncPermissions($permissionsArray)
    {
        $this->permissions()->sync($permissionsArray);

        return $this->permissions->pluck('label');
    }

    /**
     *  Give Permission To.
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
