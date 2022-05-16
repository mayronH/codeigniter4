<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'member_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'member_name' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'member_email' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'member_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '45'
            ]
        ]);

        $this->forge->addKey('member_id', true);
        $this->forge->createTable('members', true);
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}
