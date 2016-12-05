<?php

namespace Heymowski\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Model;
use Heymowski\RolesAndPermissions\Models\Role;

class Permission extends Model
{
    /**
     * Fillable Fileds.
     *
     * @var [type]
     */
    protected $fillable = ['name', 'label', 'family'];

    /**
     * Roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();;
    }

    /**
     *  getByFamily.
     */
    public static function getByFamily()
    {
        $permissions = [];

        $allPermissions = self::all();

        foreach ($allPermissions as $permission) {
            $temp_permission = [
                'id' => $permission->id,
                'name' => $permission->name,
                'label' => $permission->label,
            ];

            if (!array_key_exists($permission->family, $permissions)) {
                $permissions[$permission->family] = [];
            }

            array_push($permissions[$permission->family], $temp_permission);
        }

        return $permissions;
    }
}
