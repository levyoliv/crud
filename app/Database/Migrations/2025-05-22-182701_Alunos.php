<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alunos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'AlunoId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'usigned'        => TRUE,
                'auto_increment' => TRUE
            ],

            'Nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],

            'Endereço' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],

            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ]);

        $this->forge->addKey('AlunoId', TRUE);
        $this->forge->createTable('alunos');
    }

    public function down()
    {
        $this->forge->dropTable('alunos');
    }
}
