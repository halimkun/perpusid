<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_alter_table_users extends Migration
{
    public function up()
    {
        // add new identity info
        $fields = [
            'firstname' => ['type' => 'VARCHAR', 'constraint' => 100, 'after' => 'username'],
            'lastname'  => ['type' => 'VARCHAR', 'constraint' => 100, 'after' => 'firstname'],
            'tgl_lahir' => ['type' => 'DATE', 'after' => 'lastname'],
            'phone'     => ['type' => 'VARCHAR', 'constraint' => 15, 'after' => 'tgl_lahir'],
            'gender'    => ['type' => 'VARCHAR', 'constraint' => 2, 'after' => 'phone'],
            'profile'   => ['type' => 'VARCHAR', 'constraint' => 100, 'after' => 'gender', 'default' => 'avatar.png'],
            'address'   => ['type' => 'VARCHAR', 'constraint' => 300, 'after' => 'profile'],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        // drop new columns
        $this->forge->dropColumn('users', 'firstname');
        $this->forge->dropColumn('users', 'lastname');
        $this->forge->dropColumn('users', 'tgl_lahir');
        $this->forge->dropColumn('users', 'phone');
        $this->forge->dropColumn('users', 'gender');
        $this->forge->dropColumn('users', 'profile');
        $this->forge->dropColumn('users', 'address');
    }
}
