<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminMenusTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(AdminRoleUsersTableSeeder::class);//
        $this->call(WorkProcessesTableSeeder::class);
        $this->call(WorkProcessNodesTableSeeder::class);
        $this->call(ProjectCodesTableSeeder::class);
        $this->call(MarginAcountsTableSeeder::class);
        $this->call(AcountsTableSeeder::class);
        $this->call(ChargeRulesTableSeeder::class);
        $this->call(ChargeRuleSubsTableSeeder::class);

        // $this->call(WorkProcessNodesTableSeeder::class);
    }
}
