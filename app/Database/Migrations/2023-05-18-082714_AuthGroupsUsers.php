<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthGroupsUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 9,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 9,
                'unsigned' => true,
            ],
            'group_id' => [
                'type' => 'int',
                'constraint' => 9,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['user_id', 'group_id']);
        $this->forge->createTable('auth_groups_users');
    }

    public function down()
    {
        $this->forge->dropTable('auth_groups_users');
    }
}
