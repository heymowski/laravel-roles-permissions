Laravel Roles & Permission
===================
Another Laravel package to manage Roles and Permissions

Based on what I have learned in Laracast

Thanks to Jeffrey Way

> **Note:**

> - Tested on Laravel Framework version 5.3.26 .
> - The system uses the default Laravel User model.
> - You need a database connection.


----------


Steps
-------------

### 1. Require with composer

	composer require heymowski/laravel-roles-permissions


### 2. Add ServiceProvider

```
/*
 * Package Service Providers...
 */
 Heymowski\RolesAndPermissions\RolesAndPermissionsServiceProvider::class,
```

### 3. Publish package files
	
	php artisan vendor:publish

```
Copied Files:
- Config File: /config/RolesAndPermissions.php
- Migrations:
	2016_11_28_123904_create_roles_table
	2016_11_28_124218_create_permissions_table
	2016_11_28_124701_create_permission_role_table
	2016_11_28_125042_create_role_user_table
- Seeds (Some roles and permissions): 
	RoleSeeder.php
	PermissionSeeder.php
``` 

### 4. Migrate Tables
	
	php artisan migrate

### 5. Add trait to your User model
	
```

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Heymowski\RolesAndPermissions\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

```


### 6. Test System

	To test the system you have to be logged in
	http://localhost:8000/rolesandpermissions/role