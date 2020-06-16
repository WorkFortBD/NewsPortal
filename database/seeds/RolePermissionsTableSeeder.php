<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Role::create(['name' => 'User']);
        Role::create(['guard_name' => 'admin', 'name' => 'Subscriber']);
        Role::create(['guard_name' => 'admin', 'name' => 'Admin']);
        Role::create(['guard_name' => 'admin', 'name' => 'Editor']);
        $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);

        /**
         * Admin User Permissions
         */
        $adminUserPermissions = [

            // site settings
            'settings.view',
            'settings.edit',

            // permission manage
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',

            // admin
            'admin.view',
            'admin.create',
            'admin.edit',
            'admin.delete',

            // admin profile
            'admin_profile.view',
            'admin_profile.edit',

            // role manage
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',

            // user/customer manage
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // category
            'category.view',
            'category.create',
            'category.edit',
            'category.delete',

            // page
            'page.view',
            'page.create',
            'page.edit',
            'page.delete',

            // blog
            'blog.view',
            'blog.create',
            'blog.edit',
            'blog.delete',

            // tag
            'tag.view',
            'tag.create',
            'tag.edit',
            'tag.delete',

            // post comment
            'postcomment.view',
            'postcomment.create',
            'postcomment.edit',
            'postcomment.delete',

            // slider
            'slider.view',
            'slider.create',
            'slider.edit',
            'slider.delete',

            // tracking
            'tracking.view',
            'tracking.delete',

            // notification system
            'email_notification.view',
            'email_notification.edit',

            // message system
            'email_message.view',
            'email_message.edit',

            // dashboard
            'dashboard.view',

            // module
            'module.view',
            'module.create',
            'module.edit',
            'module.delete',
            'module.toggle',

        ];

        for ($i = 0; $i < count($adminUserPermissions); $i++) {
            $permission = Permission::create(['guard_name' => 'admin', 'name' => $adminUserPermissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
