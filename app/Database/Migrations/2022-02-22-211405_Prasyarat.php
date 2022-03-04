<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prasyarat extends Migration
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
            'prasyarat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hubungi_kami' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'faq' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('prasyarat_others');
    }

    public function down()
    {
        $this->forge->dropTable('prasyarat_others');
    }
}
