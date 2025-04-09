<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LinkTerkait extends Migration
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
            'alias'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'link'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('link_terkait');
    }

    public function down()
    {
        $this->forge->dropTable('link_terkait');
    }
}
