<?php

namespace Heymowski\RolesAndPermissions\Gates;

use Heymowski\RolesAndPermissions\Models\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class GatesServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }

    /**
     *  getPermissions.
     */
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}