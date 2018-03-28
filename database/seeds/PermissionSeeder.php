<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'List All Roles'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update Role',
                'description' => 'Update Role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'List All Users'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Update User',
                'description' => 'Update User Information'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
                'name' => 'post-create',
                'display_name' => 'Create Post',
                'description' => 'Create New Post'
            ],
            [
                'name' => 'post-list',
                'display_name' => 'Display Post Listing',
                'description' => 'List All Posts'
            ],
            [
                'name' => 'post-update',
                'display_name' => 'Update Post',
                'description' => 'Update Post Information'
            ],
            [
                'name' => 'Post-delete',
                'display_name' => 'Delete Post',
                'description' => 'Delete Post Information'
            ],
            [
                'name' => 'comment-create',
                'display_name' => 'Create Comment',
                'description' => 'Create New Comment'
            ],
            [
                'name' => 'comment-list',
                'display_name' => 'Display Comment Listing',
                'description' => 'List All Comments'
            ],
            [
                'name' => 'comment-update',
                'display_name' => 'Update Comment',
                'description' => 'Update Comment Information'
            ],
            [
                'name' => 'comment-delete',
                'display_name' => 'Delete Comment',
                'description' => 'Delete Comment Information'
            ],
 ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}