<?php

use App\Model\Roles;
use Illuminate\Database\Seeder;
use App\Model\User;
use Illuminate\Support\Facades\DB;
class userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('roles_user')->truncate();

        $adminRole=Roles::where('rol_name','admin')->first();
        $adminsRole=Roles::where('rol_name','author')->first();

        $admin=User::create([
            'ad_name'=>'tam dep trai',
            'ad_email'=>'admin@gmail.com',
            'ad_phone'=>'0355978258',
            'ad_password'=>md5('123')

        ]);
        $author=User::create([
            'ad_name'=>'nguyen tuan tam',
            'ad_email'=>'tamcb2708@gmail.com',
            'ad_phone'=>'0355978258',
            'ad_password'=>md5('123')

        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($adminsRole);
        
        factory(App\Model\User::class,10)->create();

    }
}
