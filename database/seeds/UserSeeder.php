<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('slug','web-developer')->first();
        $manager = Role::where('slug', 'project-manager')->first();
        $createTasks = Permission::where('slug','create-notifications')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();


        $user0 = new User();
        $user0->name = 'Admin';
        $user0->email = 'admin@example.com';
        $user0->password = bcrypt('password');
        $user0->save();
        $user0->roles()->attach($developer);
        $user0->permissions()->attach($createTasks);
        $user0->permissions()->attach($manageUsers);
        $user1 = new User();
        $user1->name = 'John Doe';
        $user1->email = 'john@doe.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($manager);
        $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);
    }
}
