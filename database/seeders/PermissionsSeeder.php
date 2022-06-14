<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create-comment']);
        Permission::create(['name'=>'delete-comment']);
        Permission::create(['name'=>'edit-comment']);
        Permission::create(['name'=>'reply-to-comment']);
    }
}

//php artisan db:seed --class=CreateSuperUserSeeder
//php artisan db:seed --class=PermissionsSeeder
