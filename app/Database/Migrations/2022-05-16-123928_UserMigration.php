<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'user_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ]
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
