<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'event_id' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true,
            ],
            'event_title' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'event_start' => [
                'type' => 'DATE',
            ],
            'event_end' => [
                'type' => 'DATE',
            ]
        ]);

        $this->forge->addKey('event_id', true);
        $this->forge->createTable('events', true);
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
