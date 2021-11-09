<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role;
        $adminRole-> name = "admin";
        $adminRole->display_name = "Admin Larapus";
        $adminRole->save();

        $memberRole = new Role;
        $memberRole-> name = "member";
        $memberRole->display_name = "member Larapus";
        $memberRole->save();

        $admin = new User;
        $admin-> name = "Admin Larapus";
        $admin-> email = "Admin@gmail.com";
        $admin-> password = bcrypt("rahasia");
        $admin->save();
        $admin->attachRole($adminRole);

        $member = new User;
        $member-> name = "Member Larapus";
        $member-> email = "Member@gmail.com";
        $member-> password = bcrypt("rahasia");
        $member->save();
        $member->attachRole($memberRole);
    }
}
