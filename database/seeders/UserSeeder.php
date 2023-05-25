<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Role,
    Permission
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Author','email'=>'author@gmail.com','password'=>bcrypt('password')]
        ]);
        Role::insert([
             ['name'=>'Editor','slug'=>'editor'],
             ['name'=>'Author','slug'=>'author']
        ]);
        Permission::insert([
            ['name'=>'create post','slug'=>'create-post'],
            ['name'=>'read post','slug'=>'read-post'],
            ['name'=>'update post','slug'=>'update-post'],
            ['name'=>'delete post','slug'=>'delete-post']
        ]);
    }
}
