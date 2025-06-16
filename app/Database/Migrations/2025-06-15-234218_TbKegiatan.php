<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal' => [
                'type' => 'DATETIME',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->createTable('tb_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kegiatan');
    }
}

