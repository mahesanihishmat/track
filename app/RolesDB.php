<?php
    /*
    |--------------------------------------------------------------------------
    | RolesDB.php$
    |--------------------------------------------------------------------------
    | @author Ahsan Shabbir
    | @company Qinnovation FZ LLC
    | @date 1/30/18
    |
    |--------------------------------------------------------------------------
    | <ahsan.shabbir@qinnovation.ae>
    |--------------------------------------------------------------------------
    */

    namespace App;
    use Carbon\Carbon;
    use DB;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    Class RolesDB{
        public static function run(){

            $users = array(
                array(
                    'id'   => 1,
                    'name' => "Hishmat",
                    'email' => "me@hishmat.com",
                    'password' =>\Hash::make('admin123'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ),
                array('id'   => 2,
                    'name' => "Kausar",
                    'email' => "kash@gmail.com",
                    'password' =>\Hash::make('admin123'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ),



            );


            $model_has_roles = array(
                //admin role to dev user
                array(
                    'role_id'=>'1',
                    'model_id'=>'1',

                    'model_type'=>'App\User',
                ),

                array(
                    'role_id'=>'2',
                    'model_id'=>'2',
                    'model_type'=>'App\User',
                ),

            );

            $roles = array(


                array(
                    'id' => 1,
                    'name'=>'Super User',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'id' => 2,
                    'name'=>'Admin',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),

                array(
                    'id' => 3,
                    'name'=>'User',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),

            );


          

           
            $permissions = array(
                


                array(
                    'name' =>'user-list',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'user-create',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'user-edit',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'user-delete',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),





                array(
                    'name' =>'role-list',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'role-create',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'role-edit',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'role-delete',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),





                array(
                    'name' =>'product-list',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'product-create',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'product-edit',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),
                array(
                    'name' =>'product-delete',
                    'guard_name'=>'web',
                    'created_at'    => '2017-12-24 05:14:07',
                    'updated_at'    => '2017-12-24 05:14:07',
                ),


            


            );

            DB::table('users')->insert($users);
            DB::table('permissions')->insert($permissions);
            DB::table('roles')->insert($roles);
            //DB::table('role_has_permissions')->insert($role_has_permissions);

            $admin_role = Role::findByName('admin');

            $super_user_role = Role::findByName('Super User');

            //$admin_permissions = DB::table('permissions')::get();


            //all permission except user and roles
            $super_user_permissions = DB::table('permissions')->get();

            //$filtered = collect($admin_permissions)->pluck('id');
            $su_filtered = collect($super_user_permissions)->pluck('id');

            //$admin_role->permissions()->sync($filtered);
            $super_user_role->permissions()->sync($su_filtered);

            DB::table('model_has_roles')->insert($model_has_roles);

        }
    }
