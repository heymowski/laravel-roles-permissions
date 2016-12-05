<?php

namespace Heymowski\RolesAndPermissions\Traits;

use Heymowski\RolesAndPermissions\Models\Role;

trait HasRoles
{
    /**
     *  Roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     *  syncRoles.
     */
    public function syncRoles($rolesArray)
    {
        $this->roles()->sync($rolesArray);
    }

    /**
     *  Roles Names.
     */
    public function rolesNames()
    {
        if ($this->roles->count() === 0 ) {
			return 'no roles';
        }

        $roles = $this->roles;

        $rolesArray = [];

        foreach ($roles as $role) {
        	array_push($rolesArray, $role->name);
        }

        $rolesString = implode (", ", $rolesArray);
        return $rolesString;
    }

    /**
     *  hasRole.
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    /**
     *  assignRole.
     *  $role = String.
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
}
