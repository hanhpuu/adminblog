<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
  public function run()
  {
    $role_admin = Role::where('name', 'admin')->first();
    $role_user  = Role::where('name', 'user')->first();
    $admin = new User();
    $admin->name = 'Puu quyen nang';
    $admin->email = 'puu@gmail.com';
    $admin->password = bcrypt('123456');
    $admin->save();
    $admin->roles()->attach($role_admin);
    $user = new User();
    $user->name = 'Bun beo';
    $user->email = 'bunbeo@gmail.com';
    $user->password = bcrypt('123456');
    $user->save();
    $user->roles()->attach($role_user);
  }
}