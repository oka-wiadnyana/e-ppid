<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InformasiLevel1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'level1'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'nama'       => [
                'type'       => 'text',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('level1');
    }

    public function down()
    {
        $this->forge->dropTable('level1');
    }
}
