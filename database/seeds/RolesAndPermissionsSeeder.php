<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		$permissionsByRole = [

		    'super_admin' => [
			    ['name'=>'category_list'],
			    ['name'=>'category_create'],
			    ['name'=>'category_edit'],
			    ['name'=>'category_show'],
			    ['name'=>'category_delete'],

			    ['name'=>'product_list'],
			    ['name'=>'product_create'],
			    ['name'=>'product_edit'],
			    ['name'=>'product_show'],
			    ['name'=>'product_delete'],

			    ['name'=>'customer_list'],
			    ['name'=>'customer_edit'],
			    ['name'=>'customer_show'],
			    ['name'=>'customer_delete'],

				['name'=>'tailor_list'],
			    ['name'=>'tailor_create'],
			    ['name'=>'tailor_edit'],
			    ['name'=>'tailor_show'],
			    ['name'=>'tailor_delete'],

				['name'=>'order_list'],
			    ['name'=>'order_edit'],
			    ['name'=>'order_show'],
			    ['name'=>'order_delete'],

			    ['name'=>'analytics_list'],
			    ['name'=>'analytics_create'],
			    ['name'=>'analytics_edit'],
			    ['name'=>'analytics_show'],
			    ['name'=>'analytics_delete'],
		    ],
		    
		    'tailor' => [

			    ['name'=>'product_list'],
			    ['name'=>'product_show'],

				['name'=>'order_list'],
			    ['name'=>'order_show'],
			    

		    ],
		    
		    'customer' => [
			    ['name'=>'product_list'],
			    ['name'=>'product_show'],

				['name'=>'order_list'],
			    ['name'=>'order_show'],
		    ],
		    
		];

		foreach ($permissionsByRole as $role => $permissionIds) {
			$permissions = Permission::insert($permissionIds);
		    $_role = Role::create(['name' => $role ]);

		   	$_role->givePermissionTo($permissionIds);
		}
    }
}
