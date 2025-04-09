<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profilppid extends Migration
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
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'highlight'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],,
            'content'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('video_informasi');
    }

    public function down()
    {
        $this->forge->dropTable('video_informasi');
    }
}
