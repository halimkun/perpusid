<?php

namespace App\Database\Seeds;

use App\Models\Peminjaman;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PeminjamanSeed extends Seeder
{
    public function run()
    {
        // Database initialize
        $db = \Config\Database::connect();

        // User model
        $user = $db->table('users');
        $user->select('id');
        $usid = $user->get();

        // Buku model
        $buku = $db->table('buku');
        $buku->select('kode_buku');
        $buk = $buku->get();

        // Time
        $now = new Time('now', 'Asia/Jakarta');

        // faker initialize
        $peminjam = new Peminjaman();
        $faker    = \Faker\Factory::create('id_ID');

        for ($i = 1; $i < 10; $i++) {
            $tgl_pinjam  = new Time("2021-12-$i", 'Asia/Jakarta');
            $tgl_kembali = $tgl_pinjam->addDays(7);
            
            for ($j = 0; $j < rand(1, 9); $j++) {
                $uid = $faker->randomElement($usid->getResult('array'));
                $bid = $faker->randomElement($buk->getResultArray());
    
                $peminjam->save([
                    'kode_peminjaman'   => uniqid(),
                    'kode_buku'         => $bid,
                    'userid'            => $uid,
                    'tanggal_pinjam'    => $tgl_pinjam->toDateString(),
                    'tanggal_kembali'   => $tgl_kembali->toDateString(),
                    'peminjaman_status' => ($tgl_kembali < $now) ? 1 : $faker->randomElement([0, 2, 3])
                ]);
            }
        }

        /** status peminjaman
         * 1 dikembalikan
         * 2 dipinjamkan
         * 3 proses
         * 0 ditolak 
         **/
    }
}
