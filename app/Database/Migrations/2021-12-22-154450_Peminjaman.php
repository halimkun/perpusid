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
            "id_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 150,
            ],
            "userid"            => [
                "type"       => "INT",
                "constraint" => 11,
                "unsigned" => true,
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
        ]);

        $this->forge->addKey("id_peminjaman", TRUE);
        $this->forge->createTable("peminjaman", true);
    }

    public function down()
    {
        $this->forge->dropTable("peminjaman", true);
    }
}
