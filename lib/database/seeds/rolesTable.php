<?php

use Illuminate\Database\Seeder;
use App\Model\Roles;
class rolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();
        Roles::create(['rol_name'=>'admin']);
        Roles::create(['rol_name'=>'author']);
        
    }
}
