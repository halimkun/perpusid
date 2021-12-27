<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class AdminSeed extends Seeder
{
    public function run()
    {
        // Group Data
        $auth_groups = [
            [
                "id"          => 1,
                "name"        => 'admin',
                "description" => 'site administration'
            ],
            [
                "id"          => 2,
                "name"        => 'anggota',
                "description" => 'general user'
            ],
        ];
        $this->db->table('auth_groups')->insertBatch($auth_groups);
        // -------------------------------------------------------- //

        $user  = new UserModel();
        $faker = \Faker\Factory::create('id_ID');

        $user->withGroup('admin')->save([
            'firstname'     => $faker->firstName('male'),
            'lastname'      => $faker->lastName(),
            'email'         => "admin@gmail.com",
            'username'      => "admin",
            'tgl_lahir'     => $faker->date('Y-m-d'),
            'phone'         => $faker->phoneNumber(),
            'gender'        => "L",
            'profile'       => "avatar.png",
            'address'       => $faker->address(),
            'password_hash' => '$2y$10$P4p.Nw.GBB63hWgIOqJpYufdviIBFtMtlEbfl5lHSOtaUdLnSyYme',
            'active'        => 1,
            'created_at'    => "2021-11-12 23:34:35-06:00",
            'updated_at'    => "2021-11-12 23:34:35-06:00",
            'deleted_at'    => NULL
            // 'password'      => "04062001",
        ]);
    }
}
