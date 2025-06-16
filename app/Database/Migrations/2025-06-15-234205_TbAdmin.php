<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAdmin extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('tb_admin');
    }

    public function down()
    {
        $this->forge->dropTable('tb_admin');
    }
}
