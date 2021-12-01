<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id'      => 1,
                'name'    => 'សែម គឹមសាន',
                'gender'  => 'male',
                'email'    => 'keamsan.sem@gmail.com',
                'phone'    => '0969140554',
                'password' => Hash::make(12345678),
                'email_verified_at'  => now(),
                'created_at'  => now(),
                'role_id'     => 1,
                'about'      => '',
                'facebook'   => 'https://www.facebook.com/semkeamsan',
                'telegram'   => 'https://t.me/semkeamsan',
                'twitter'   =>  'https://twitter.com/semkeamsan',
                'linkedin'   => 'https://www.linkedin.com/in/semkeamsan',
                'avatar'  =>  asset('/images/avatar.png'),
            ],
            [
                'id'      => 2,
                'name'    => 'មេដឹកនាំ',
                'gender'  => 'male',
                'email'    => 'leader@gmail.com',
                'phone'    => null,
                'password' => Hash::make(12345678),
                'email_verified_at'  => now(),
                'created_at'  => now(),
                'role_id'     => 2,
                'about'      => null,
                'facebook'   => 'https://www.facebook.com/',
                'telegram'   => 'https://t.me/',
                'twitter'   =>  'https://twitter.com/',
                'linkedin'   => 'https://www.linkedin.com/in/',
                'avatar'  =>  asset('/images/avatar.png'),
            ],
            [
                'id'      => 3,
                'name'    => 'អ្នកកែប្រែ',
                'gender'  => 'male',
                'email'    => 'editor@gmail.com',
                'phone'    => null,
                'password' => Hash::make(12345678),
                'email_verified_at'  => now(),
                'created_at'  => now(),
                'role_id'     => 3,
                'about'      => null,
                'facebook'   => 'https://www.facebook.com/',
                'telegram'   => 'https://t.me/',
                'twitter'   =>  'https://twitter.com/',
                'linkedin'   => 'https://www.linkedin.com/in/',
                'avatar'  =>  asset('/images/avatar.png'),
            ],
        ]);
    }
}
