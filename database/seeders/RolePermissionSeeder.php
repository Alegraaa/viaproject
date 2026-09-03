<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Buat permission (izin-izin kecil)
        $permissions = [
            'manage products',
            'view orders',
            'create orders',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role Admin — dapat SEMUA permission
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo($permissions);

        // Buat role Customer — cuma dapat izin buat order
        $customer = Role::firstOrCreate(['name' => 'customer']);
        $customer->givePermissionTo(['create orders']);
    }
}