<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\User as EntitiesUser;
use App\Models\UserModel;

class UserSeed extends Seeder
{
    public function run()
    {
        // User Data
        $user = new UserModel();
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 2; $i < 50; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $jk     = $faker->randomElement(['L', 'P']);
            $join   = $faker->dateTimeThisYear();

            $user->withGroup('anggota')->insert([
                'id'            => $i,
                'email'         => "user$i@gmail.com",
                'username'      => "user$i",
                'firstname'     => $faker->firstName($gender),
                'lastname'      => $faker->lastName(),
                'tgl_lahir'     => $faker->date('Y-m-d'),
                'phone'         => $faker->phoneNumber(),
                'gender'        => $jk,
                'profile'       => "avatar.png",
                'address'       => $faker->address(),
                'password_hash' => '$2y$10$0jKJoWYAdVtlhMoHos.WBeF5pDz.Zhq6snvAJIUXy5WQFq8gZFC1W',
                'active'        => 1,
                'created_at'    => $join,
                'updated_at'    => $join,
                'deleted_at'    => NULL
            ]);
            // 'password'      => "123456789",
        }

        // auth_groups_users Data
        // $auth_groups_users = [
        //     [
        //         "group_id" => 49329,
        //         "user_id"  => 64284
        //     ],
        //     [
        //         "group_id" => 49329,
        //         "user_id"  => 64285
        //     ],
        // ];
        // $this->db->table('auth_groups_users')->insertBatch($auth_groups_users);
    }
}
