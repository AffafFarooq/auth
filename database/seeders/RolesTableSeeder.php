<?php
namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public  $guard_name = '*';
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	DB::table('roles')->truncate();
    	Schema::enableForeignKeyConstraints();


		$roleSuperAdmin = [
			'name' => 'Superadmin',
			'guard_name' => 'web',
        ];
        $id = DB::table('roles')->insertGetId($roleSuperAdmin);
        $roleAdmin = [
            'name' => 'admin',
            'guard_name' => 'web',
        ];
        $id = DB::table('roles')->insertGetId($roleAdmin);

    }
}
