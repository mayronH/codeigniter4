<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeopleMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'person_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'person_firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'person_lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'person_email' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
        ]);

        $this->forge->addKey('person_id', true);
        $this->forge->createTable('people', true);
    }

    public function down()
    {
        $this->forge->dropTable('people');
    }
}
