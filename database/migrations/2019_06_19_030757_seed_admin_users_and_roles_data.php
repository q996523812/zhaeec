<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedAdminUsersAndRolesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin_roles = [
            [
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => '业务员',
                'slug' => 'business',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => '部门经理',
                'slug' => 'departmanager',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'name' => '风控',
                'slug' => 'riskcontrol',
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'name' => '领导',
                'slug' => 'leader',
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'name' => '综合',
                'slug' => 'complex',
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'name' => '信息部',
                'slug' => 'manage',
                'created_at' => now(),
            ],
        ];
        $admin_menu = [
            [
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'order' => 2,
                'title' => '管理员',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'title' => 'Index',
                'icon' => 'fa-bar-chart',
                'uri' => 'auth/users',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'order' => 5,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'parent_id' => 2,
                'order' => 6,
                'title' => '菜单',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'created_at' => now(),
            ],
            [
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar',
                'uri' => '/',
                'created_at' => now(),
            ],
            [
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar',
                'uri' => '/',
                'created_at' => now(),
            ],
            [
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar',
                'uri' => '/',
                'created_at' => now(),
            ],
            [
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'fa-bar',
                'uri' => '/',
                'created_at' => now(),
            ],

        ];
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
