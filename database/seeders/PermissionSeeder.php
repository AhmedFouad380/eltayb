<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $all = [
            'view Admin',
            'delete Admin',
            'add Admin',
            'edit Admin',
            'view User',
            'delete User',
            'add User',
            'edit User',
            'view Categories',
            'delete Categories',
            'add Categories',
            'edit Categories',
            'view Page',
            'delete Page',
            'add Page',
            'edit Page',
            'view Slider',
            'delete Slider',
            'add Slider',
            'edit Slider',
            'view Product',
            'delete Product',
            'add Product',
            'edit Product',
            'view Storage',
            'delete Storage',
            'add Storage',
            'view StorageTransaction',
            'delete StorageTransaction',
            'view Shapes',
            'delete Shapes',
            'add Shapes',
            'edit Shapes',
            'view Coupons',
            'delete Coupons',
            'edit Coupons',
            'add Coupons',
            'view Orders',
            'detail Orders',
            'delete Orders',
            'update Orders',

            'view General_Setting',
            'update General_Setting',
            'view Order_Reports',
            'view Product_Reports',
            'view branches',
            'delete branches',
            'add branches',
            'edit branches',
            'view units',
            'delete units',
            'add units',
            'edit units',
            'view clients',
            'delete clients',
            'add clients',
            'edit clients',
            'view suppliers',
            'delete suppliers',
            'add suppliers',
            'edit suppliers',
            'view receipts',
            'delete receipts',
            'add receipts',
            'edit receipts',
            'view invoices',
            'delete invoices',
            'add invoices',
            'edit invoices',
            'view Permissions',
            'delete Permissions',
            'add Permissions',
            'edit Permissions',
            'view Pos',


        ];

        if(Permission::count() == 0){
            $role1 = Role::create(['name' => 'superAdmin','guard_name'=>'admin']);

            foreach($all as $name){
                Permission::create(['name' => $name,'guard_name'=>'admin']);
                $role1->givePermissionTo($name);
            }


            if(\App\Models\Admin::where('name','admin')->count() == 0){
                $user = \App\Models\Admin::create([
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' =>Hash::make(123456),
                    'phonen' => '010000000',
                ]);
                $user->assignRole($role1);
            }else{
                $user=  \App\Models\Admin::where('name','admin')->first();
                $user->assignRole($role1);

            }
        }

//
//        if(Permission::count() == 0){
//            $role1 = Role::create(['name' => 'superAdmin','guard_name'=>'admin']);
//
//            foreach($all as $name){
//                Permission::create(['name' => $name,'guard_name'=>'admin']);
//                $role1->givePermissionTo($name);
//            }
//
//
//            if(\App\Models\Admin::where('name','admin')->count() == 0){
//                $user = \App\Models\Admin::create([
//                    'name' => 'admin',
//                    'email' => 'admin@gmail.com',
//                    'password' =>Hash::make(123456),
//                    'phonen' => '010000000',
//                ]);
//                $user->assignRole($role1);
//            }else{
//                $user=  \App\Models\Admin::where('name','admin')->first();
//                $user->assignRole($role1);
//
//            }
//        }

    }
}
