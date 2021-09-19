<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Schema;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        //Reset Cashed roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(
            [
                'name' => 'dashboard',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'category list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'category add',
                'guard_name' => 'web'
            ]);
        Permission::create(
                    [
                        'name' => 'category edit',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
                    [
                        'name' => 'category delete',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
                    [
                        'name' => 'sitesetting',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
            [
                'name' => 'sitesetting add',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'smtpsetting',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'smtpsetting add',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'systemsetting',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'systemsetting add',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'user list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'user add',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'user edit',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'user delete',
                'guard_name' => 'web'
            ]);

        Permission::create(
            [
                'name' => 'user event list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'archieve user list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'reactive user',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'role list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'role add',
                'guard_name' => 'web'
            ]);

        Permission::create(
            [
                'name' => 'role edit',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'event list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'event add',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'event edit',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'event delete',
                'guard_name' => 'web'
            ]);
        Permission::create(
                    [
                        'name' => 'user events',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
                    [
                        'name' => 'user create event',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
                    [
                        'name' => 'user edit event',
                        'guard_name' => 'web'
                    ]);
        Permission::create(
                            [
                                'name' => 'user delete event',
                                'guard_name' => 'web'
                            ]);

        Permission::create(
            [
                'name' => 'Feature list',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'Feature delete',
                'guard_name' => 'web'
            ]);
        Permission::create(
            [
                'name' => 'Feature respond',
                'guard_name' => 'web'
            ]);



    }
}
