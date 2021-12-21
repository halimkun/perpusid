<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\User as EntitiesUser;

class UserSeed extends Seeder
{
    public function run()
    {
        // User Data
        $users = [
            [
                'id'            => 64284,
                'firstname'     => "ahmed",
                'lastname'      => "nagi",
                'email'         => "user1@gmail.com",
                'username'      => "user1",
                'tgl_lahir'     => "2001-10-04",
                'phone'         => "082375849284",
                'gender'        => "L",
                'profile'       => "avatar.png",
                'address'       => "Alamatnya diutara sana",
                'password_hash' => '$2y$10$0jKJoWYAdVtlhMoHos.WBeF5pDz.Zhq6snvAJIUXy5WQFq8gZFC1W',
                'active'        => 1,
                'reset_hash'    => null,
                'reset_at'      => null,
                'reset_expires' => null,
                // 'password'      => "123456789",
            ],
            [
                'id'            => 64285,
                'firstname'     => "Abhishek",
                'lastname'      => "Bagul",
                'email'         => "user2@gmail.com",
                'username'      => "user2",
                'tgl_lahir'     => "2001-10-10",
                'phone'         => "082375849344",
                'gender'        => "L",
                'profile'       => "avatar.png",
                'address'       => "Alamatnya diselatan jauh sana",
                'password_hash' => '$2y$10$0jKJoWYAdVtlhMoHos.WBeF5pDz.Zhq6snvAJIUXy5WQFq8gZFC1W',
                'active'        => 1,
                'reset_hash'    => null,
                'reset_at'      => null,
                'reset_expires' => null,
                // 'password'      => "123456789",
            ],
        ];
        // $data = new EntitiesUser($users);
        // dd($data);

        $this->db->table('users')->insertBatch($users);
        // -------------------------------------------------------- //

        // auth_groups_users Data
        $auth_groups_users = [
            [
                "group_id" => 49329,
                "user_id"  => 64284
            ],
            [
                "group_id" => 49329,
                "user_id"  => 64285
            ],
        ];
        $this->db->table('auth_groups_users')->insertBatch($auth_groups_users);
    }
}
