<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPenerimaanSiswa extends Migration
{
    public function up()
{
         $this->forge->addField([
            'id_jurusan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jumlah_diterima' => [
                'type' => 'INT',
                'constraint' => '10',
            ],
            'upload_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_jurusan', true);
        $this->forge->createTable('tb_penerimaan_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_penerimaan_siswa');
    }
}
