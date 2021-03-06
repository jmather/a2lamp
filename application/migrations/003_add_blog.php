<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ),
            'content' => array(
                'type'           => 'TEXT'
            ),
            'author' => array(
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ),
            'timestamp' => array(
                'type'           => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
            ),
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('blog');
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }

}