<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = app(Role::class)->findOrCreate(RolesEnum::ADMIN->value, 'web');
        $permissionIndexUsers = app(Permission::class)->findOrCreate(PermissionsEnum::USERS_INDEX->value, 'web');

        $roleAdmin->givePermissionTo($permissionIndexUsers);
    }
}
