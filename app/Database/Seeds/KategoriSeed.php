<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'idk'           => 857349,
                'k'             => 'teknologi',
                'created_at'    => '2021-12-18 02:15:07',
                'updated_at'    => '2021-12-18 02:15:07',
                'deleted_at'    => NULL
            ],
            [
                'idk'           => 857350,
                'k'             => 'sejarah',
                'created_at'    => '2021-12-18 02:15:18',
                'updated_at'    => '2021-12-18 02:15:18',
                'deleted_at'    => NULL
            ],
            [
                'idk'           => 857351,
                'k'             => 'sains',
                'created_at'    => '2021-12-18 02:15:22',
                'updated_at'    => '2021-12-18 02:15:22',
                'deleted_at'    => NULL
            ],
            [
                'idk'           => 857352,
                'k'             => 'matematika',
                'created_at'    => '2021-12-18 02:15:22',
                'updated_at'    => '2021-12-18 02:15:22',
                'deleted_at'    => NULL
            ],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}
