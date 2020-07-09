<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = "Maniruzzaman";
        $user->last_name = "Akash";
        $user->username = "akash";
        $user->phone_no = "01951233084";
        $user->email = "manirujjamanakash@gmail.com";
        $user->password = Hash::make('123456');
        $user->status = 1;
        $user->save();
    }
}
