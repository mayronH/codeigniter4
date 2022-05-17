<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePerson extends Migration
{
    protected $fields = [
        'person_password' => ['type' => 'VARCHAR', 'constraint' => '255'],
        'created_at' => ['type' => 'datetime', 'null' => true],
        'updated_at' => ['type' => 'datetime', 'null' => true],
        'deleted_at' => ['type' => 'datetime', 'null' => true],
    ];

    public function up()
    {
        $this->forge->addColumn('people', $this->fields);
    }

    public function down()
    {
        $this->forge->dropColumn('people', $this->fields);
    }
}
