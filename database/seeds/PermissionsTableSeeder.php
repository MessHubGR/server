<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$loginDashboardPermission = Permission::create([
		    'name' => 'Dashboard login',
		    'slug' => 'login.dashboard',
		    'description' => 'Allows said user to log into the dashboard.'
		]);

		$viewHubsPermission = Permission::create([
		    'name' => 'View hubs',
		    'slug' => 'view.hubs',
		    'description' => 'Allows said user to view all hubs.'
		]);

		$unlockHubPermission = Permission::create([
		    'name' => 'Unlock hubs',
		    'slug' => 'unlock.hubs',
		    'description' => 'Allows said user to unlock all hubs.'
		]);

		$manageHubsPermission = Permission::create([
		    'name' => 'Manage hubs',
		    'slug' => 'manage.hubs',
		    'description' => 'Allows said user to manage the hubs.'
		]);

		$viewRefugeesPermission = Permission::create([
		    'name' => 'View refugees',
		    'slug' => 'view.refugees',
		    'description' => 'Allows said user to view all refugees.'
		]);

		$trackRefugeesPermission = Permission::create([
		    'name' => 'Track refugees',
		    'slug' => 'track.refugees',
		    'description' => 'Allows said user to track all refugees.'
		]);

		$manageRefugeesPermission = Permission::create([
		    'name' => 'Manage refugees',
		    'slug' => 'manage.refugees',
		    'description' => 'Allows said user to manage refugees.'
		]);

		$manageUsersPermission = Permission::create([
		    'name' => 'Manage users',
		    'slug' => 'manage.users',
		    'description' => 'Allows said user to manage users.'
		]);
    }
}
