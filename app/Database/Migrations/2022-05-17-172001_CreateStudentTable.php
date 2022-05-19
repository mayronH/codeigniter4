<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'student_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'student_cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'student_email' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ],
            'student_image' => [
                'type' => 'VARCHAR',
                'constraint' => '180'
            ],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('student_id', true);
        $this->forge->createTable('students', true);
    }

    public function down()
    {
        //
    }
}
