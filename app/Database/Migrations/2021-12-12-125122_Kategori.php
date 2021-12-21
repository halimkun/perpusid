<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idk" => [
                "type" => "INT",
                "auto_increment" => true
            ],
            "k" => [
                "type" => "VARCHAR",
                "constraint" => 50,
            ],
            "created_at" => [
                "type"  => "datetime",
                "null"  => true
            ],
            "updated_at" => [
                "type"  => "datetime",
                "null"  => true
            ],
            "deleted_at" => [
                "type"  => "datetime",
                "null"  => true
            ],
        ]);
        $this->forge->addPrimaryKey("idk");
        $this->forge->createTable("kategori");
    }

    public function down()
    {
        $this->forge->dropTable("kategori");
    }
}
