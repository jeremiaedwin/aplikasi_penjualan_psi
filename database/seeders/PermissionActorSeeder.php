<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'scan product for sell']);
        Permission::create(['name' => 'scan product for add stock']);
        Permission::create(['name' => 'make transaction']);

        $cashierRole = Role::create(['name' => 'cashier']);
        $cashierRole->givePermissionTo('view product');
        $cashierRole->givePermissionTo('scan product for sell');
        $cashierRole->givePermissionTo('make transaction');

        $warehouseRole = Role::create(['name' => 'warehouse']);
        $warehouseRole->givePermissionTo('view product');
        $warehouseRole->givePermissionTo('create product');
        $warehouseRole->givePermissionTo('edit product');
        $warehouseRole->givePermissionTo('delete product');
        $warehouseRole->givePermissionTo('scan product for add stock');
        
        $user = User::factory()->create([
            'name' => 'Admin Kasir',
            'email' => 'admin_kasir@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($cashierRole);

        $user = User::factory()->create([
            'name' => 'Admin Gudang',
            'email' => 'admin_gudang@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($warehouseRole);
    }
}
