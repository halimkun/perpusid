<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peminjaman'     => [
                'type'       => "INT",
                'constraint' => 11
            ],
            'kode_peminjaman'   => [
                'type'       => "VARCHAR",
                'constraint' => 20
            ],
            'tanggal_pinjam'    => [
                'type'       => "VARCHAR",
                'constraint' => 20
            ],
            'tanggal_kembali'   => [
                'type'       => "VARCHAR",
                'constraint' => 20
            ],
            'peminjaman_status' => [
                'type'       => "INT",
                'constraint' => 11
            ],
            "kode_buku"         => [
                "type"       => "VARCHAR",
                "constraint" => 150
            ],
            "kode_anggota"      => [
                "type"       => "VARCHAR",
                "constraint" => 30
            ],
        ]);

        $this->forge->addKey("id_peminjaman", TRUE);
        $this->forge->createTable("peminjaman");
    }

    public function down()
    {
        $this->forge->dropTable("peminjaman");
    }
}
