<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();
        $key = md5(microtime() . rand());
        $superAdmin = User::create([
            'email'=>'superadmin@gmail.com',
            'name'=>'Superadmin',
            'password'=>'$2y$10$i91qeN0EOuQeJzV/SskEqeP73qcSuNES14OyEF79WofsGBIFsYuUW', //admin1234
            'role_id'=>'1',
            'remember_token'=>'NlPo4Mr4KXcEw2Ltc2ujMwNh15VO405hLCeplSO1kDh7Gzr8r1J7ZnS3jixL'
        ]);
        $superAdmin->assignRole('Superadmin');
        $admin = User::create([
            'email'=>'admin@gmail.com',
            'name'=>'Admin',
            'password'=>'$2y$10$i91qeN0EOuQeJzV/SskEqeP73qcSuNES14OyEF79WofsGBIFsYuUW', //admin1234
            'role_id'=>'2',
            'remember_token'=>'NlPo4Mr4KXcEw2Ltc2ujMwNh15VO405hLCeplSO1kDh7Gzr8r1J7ZnS3jixL'
        ]);
        $admin->assignRole('Superadmin');

    }
}
