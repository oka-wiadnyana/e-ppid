<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Eppid extends Migration
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
                'constraint' => '10',
                'null' => true,
            ],
            'level2'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'level3'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'level4'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'uraian' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('link_informasi');
    }

    public function down()
    {
        $this->forge->dropTable('link_informasi');
    }
}
