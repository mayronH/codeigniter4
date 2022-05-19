<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserAddPassword extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', ['person_password' => ['type' => 'VARCHAR', 'constraint' => '255']]);
        $this->forge->modifyColumn(
            'users',
            ['user_email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '150',
            ]]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['user_password' => ['type' => 'VARCHAR', 'constraint' => '255']]);
        $this->forge->modifyColumn(
            'users',
            ['user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ]]
        );
    }
}
