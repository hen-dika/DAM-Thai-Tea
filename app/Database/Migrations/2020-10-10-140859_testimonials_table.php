<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestimonialsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'		=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE	
			],
			'name'=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
				'null'			=> TRUE
			],
			'username'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'testimoni'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'image'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'status'      	=> [
                'type'          => 'ENUM',
                'constraint'    => ['0', '1'],
                'default'       => '0'
        	],
			'created_at'=> [
				'type'			=> 'DATETIME',
				'null'			=> TRUE
			],
			'updated_at'=> [
				'type'			=> 'DATETIME',
				'null'			=> TRUE
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('testimonials');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('testimonials');
	}
}
