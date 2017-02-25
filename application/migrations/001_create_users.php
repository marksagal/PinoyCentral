<?php
class Migration_Create_Users extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'uid' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
            ),
            'username' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
            ),
            'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
            )
        ]);
        $this->dbforge->add_key('uid', true);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
