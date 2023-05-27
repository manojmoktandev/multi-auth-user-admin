<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin =  [
                    [   'name'=>'Admin',
                        'email'=>'admin@admin.com',
                        'password'=>bcrypt('password')
                    ],
                    [   'name'=>'Editor',
                        'email'=>'editor@admin.com',
                        'password'=>bcrypt('password')
                    ],
                    [   'name'=>'Author',
                        'email'=>'author@admin.com',
                        'password'=>bcrypt('password')
                    ]
            ];
        Admin::insert($admin);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author']
        ]);
        Permission::insert([
           ['name'=>'create post','slug'=>'create-post'],
           ['name'=>'read post','slug'=>'read-post'],
           ['name'=>'update post','slug'=>'update-post'],
           ['name'=>'delete post','slug'=>'delete-post']
        ]);
        //Assign Role to Admin
        Admin::whereId(1)->first()->roles()->attach([1]);
        Admin::whereId(2)->first()->roles()->attach([2]);
        Admin::whereId(3)->first()->roles()->attach([3]);

        //Assign Permission
        Role::whereId(1)->first()->permissions()->attach([1,2,3,4]);
        Role::whereId(2)->first()->permissions()->attach([1,2,3]);
        Role::whereId(3)->first()->permissions()->attach([2]);
    }
}
