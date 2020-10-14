<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AboutusTable extends Migration
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
			'meta_title'=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'meta_description'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'meta_keyword'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'phone'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'email'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'facebook'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'twitter'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'instagram'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
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
		$this->forge->createTable('about_us');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('about_us');
	}
}
