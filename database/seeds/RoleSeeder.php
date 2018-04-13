<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User has access to all system functionality'
            ],
            [
                'name' => 'mode',
                'display_name' => 'Moderator',
                'description' => 'User can create create data in the system'
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'User can do smth'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }

}
