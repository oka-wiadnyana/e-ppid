<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profilsatker extends Migration
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
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'nama_pendek'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
            ],
            'nomor_telepon'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ],
            'nomor_fax'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'link_satker' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'link_youtube' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'link_facebook' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'link_instagram' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'link_twitter' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'link_video_dashboard' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_satker');
    }

    public function down()
    {
        $this->forge->dropTable('profil_satker');
    }
}
