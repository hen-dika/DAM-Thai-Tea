<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenusTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'      	 	=> [
				'type'          => 'INT',
				'constraint'    => 5,
				'unsigned'      => TRUE,
				'auto_increment'=> TRUE
			],
			'name'      	=> [
				'type'          => 'VARCHAR',
				'constraint'    => '255'
			],
			'description' 	=> [
				'type'          => 'TEXT',
				'null'			=> TRUE
			],
			'image' 		=> [
				'type'          => 'VARCHAR',
				'constraint'	=>	'255'
			],
			'price'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '255'
			],
			'status'      	=> [
                'type'          => 'ENUM',
                'constraint'    => ['0', '1'],
                'default'       => '0'
        	],
        	'category_id'	=> [
        		'type'			=> 'INT',
        		'constraint'	=> 5,
        		'unsigned'		=> TRUE,
        		'null'			=> TRUE
        	],
			'created_at' 	=> [
				'type'          => 'DATETIME',
				'null'			=> TRUE
			],
			'updated_at' 	=> [
				'type'          => 'DATETIME',
				'null'			=> TRUE
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('category_id','categories','id','CASCADE','CASCADE');
		$this->forge->createTable('menus');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('menus');
	}
}
