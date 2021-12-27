<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peminjaman'     => [
                'type'           => "INT",
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'kode_peminjaman'   => [
                'type'       => "VARCHAR",
                'constraint' => 20
            ],
            "kode_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 150,
            ],
            "userid"            => [
                "type"       => "INT",
                "constraint" => 11,
            ],
            'tanggal_pinjam'    => [
                'type'       => "DATE",
            ],
            'tanggal_kembali'   => [
                'type'       => "DATE",
            ],
            'peminjaman_status' => [
                'type'       => "INT",
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey("id_peminjaman", TRUE);
        $this->forge->createTable("peminjaman", true);
    }

    public function down()
    {
        $this->forge->dropTable("peminjaman", true);
    }
}
