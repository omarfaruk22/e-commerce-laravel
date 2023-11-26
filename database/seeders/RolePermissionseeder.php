<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard' => ['dashboard.view', 'dashboard.edit'],
            'category' => ['category.create', 'category.view', 'category.edit', 'category.delete', 'category.approve'],
            'subcategory' => ['subcategory.create', 'subcategory.view', 'subcategory.edit', 'subcategory.delete', 'subcategory.approve'],
            'admin' => ['admin.create', 'admin.view', 'admin.edit', 'admin.delete', 'admin.approve'],
            'role' => ['role.create', 'role.view', 'role.edit', 'role.delete', 'role.approve'],
            'profile' => ['profile.view', 'profile.edit'],
        ];

        $guardName = 'web';

        $roleSuperAdmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => $guardName]);

        foreach ($permissions as $group => $permissionNames) {
            foreach ($permissionNames as $permissionName) {
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'group_name' => $group,
                    'guard_name' => $guardName,
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
            }
        }

        $admin = User::where('username', 'superadmin')->first();

        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }
}
