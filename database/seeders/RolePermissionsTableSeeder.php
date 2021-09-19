<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        //Super Admin Role Permissions
        $super_admin_role = Role::whereName('Superadmin')->first();
        $all_permissions = Permission::all();
        $super_admin_role->givePermissionTo($all_permissions);

        // Principle Role Permissions
        $admin_permissions = Role::whereName('admin')->first();
        $all_permissions = Permission::all();
        $admin_permissions->givePermissionTo($all_permissions);

        // //Vice Principle Role Permissions
        // $vice_princile_permissions = Role::whereName('Vice Principle')->first();
        // $vice_princile_permissions_assign = Permission::whereIN('name', ['dashboard', 'classes', 'add', 'edit', 'delete', 'admissionStructure', 'addStudent', 'feeVoucher'])->get();
        // $vice_princile_permissions->givePermissionTo($vice_princile_permissions_assign);

        // //Teacher Role Permissions
        // $teacher_permissions = Role::whereName('Teacher')->first();
        // $teacher_permissions_assign = Permission::whereIN('name', ['dashboard', 'classes'])->get();
        // $teacher_permissions->givePermissionTo($teacher_permissions_assign);

    }
}
