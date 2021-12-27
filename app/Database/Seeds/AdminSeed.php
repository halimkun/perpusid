<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\User as EntitiesUser;

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

        // User Data
        $users = [
            'id'            => 1,
            'firstname'     => "Faisal",
            'lastname'      => "Halim",
            'email'         => "ffaisalhalim@gmail.com",
            'username'      => "halimkun",
            'tgl_lahir'     => "2001-06-04",
            'phone'         => "082329089580",
            'gender'        => "L",
            'profile'       => "avatar.png",
            'address'       => "Dk. Sampel Rt.01 Rw.02 Ds. Lolong Kec. Karanganyar Keb. Pekalongan Jawa Tengah Indonesia",
            'password_hash' => '$2y$10$P4p.Nw.GBB63hWgIOqJpYufdviIBFtMtlEbfl5lHSOtaUdLnSyYme',
            'active'        => 1,
            'created_at'    => "2021-11-12 23:34:35-06:00",
            'updated_at'    => "2021-11-12 23:34:35-06:00",
            'deleted_at'    => NULL
            // 'password'      => "04062001",
        ];
        // $data = new EntitiesUser($users);
        // dd($data);

        $this->db->table('users')->insert($users);
        // -------------------------------------------------------- //

        // auth_groups_users Data
        $auth_groups_users = [
            "group_id" => 1,
            "user_id"  => 1
        ];
        $this->db->table('auth_groups_users')->insert($auth_groups_users);
    }
}
