<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customerRole = Role::create(['name' => RolesEnum::Customer->value]);
        $driverRole = Role::create(['name' => RolesEnum::Driver->value]);
        $managerRole = Role::create(['name' => RolesEnum::Manager->value]);

        $viewAndEditProfilePermission = Permission::create([
            'name' => PermissionsEnum::ViewAndEditProfile->value,
        ]);
        $browseMenuPermission = Permission::create([
            'name' => PermissionsEnum::BrowseMenu->value,
        ]);
        $placeOrderPermission = Permission::create([
            'name' => PermissionsEnum::PlaceOrder->value,
        ]);
        $viewDeliveryStatusPermission = Permission::create([
            'name' => PermissionsEnum::ViewDeliveryStatus->value,
        ]);
        $updateDeliveryInfoPermission = Permission::create([
            'name' => PermissionsEnum::UpdateDeliveryInfo->value,
        ]);
        $updateMenuPermission = Permission::create([
            'name' => PermissionsEnum::UpdateMenu->value,
        ]);
        $manageRolesPermission = Permission::create([
            'name' => PermissionsEnum::ManageRoles->value,
        ]);
        $manageLoginPermission = Permission::create([
            'name' => PermissionsEnum::ManageLogin->value,
        ]);

        $customerRole->syncPermissions([
            $viewAndEditProfilePermission,
            $browseMenuPermission,
            $placeOrderPermission,
            $viewDeliveryStatusPermission,
        ]);
        $driverRole->syncPermissions([
            $viewAndEditProfilePermission,
            $browseMenuPermission,
            $placeOrderPermission,
            $viewDeliveryStatusPermission,
            $updateDeliveryInfoPermission
        ]);
        $managerRole->syncPermissions([
            $viewAndEditProfilePermission,
            $browseMenuPermission,
            $placeOrderPermission,
            $viewDeliveryStatusPermission,
            $updateDeliveryInfoPermission,
            $updateMenuPermission,
            $manageRolesPermission,
            $manageLoginPermission
        ]);

        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
        ])->assignRole(RolesEnum::Customer);

        User::factory()->create([
            'name' => 'Driver User',
            'email' => 'driver@example.com',
        ])->assignRole(RolesEnum::Driver);

        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
        ])->assignRole(RolesEnum::Manager);
    }
}
