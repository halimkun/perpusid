<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id_buku" => [
                "type"           => "INT",
                "constraint"     => 20,
                "auto_increment" => true
            ],
            "kode_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 150
            ],
            "stok_buku"  => [
                "type"       => "INT",
                "constraint" => 11
            ],
            "judul_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 255
            ],
            "sinopsis" => [
                "type" => "TEXT"
            ],
            "kategori" => [
                "type"       => "VARCHAR",
                "constraint" => 255
            ],
            "penulis_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 255
            ],
            "penerbit_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 50
            ],
            "tahun_terbit" => [
                "type"       => "VARCHAR",
                "constraint" => 100
            ],
            "cover_buku" => [
                "type"       => "VARCHAR",
                "constraint" => 255
            ],
            "created_at" => [
                "type" => "datetime",
                "null" => true
            ],
            "updated_at" => [
                "type" => "datetime",
                "null" => true
            ],
            "deleted_at" => [
                "type" => "datetime",
                "null" => true
            ],
        ]);
        $this->forge->addKey("id_buku", TRUE);
        $this->forge->createTable("buku");
    }

    public function down()
    {
        $this->forge->dropTable("buku");
    }
}
