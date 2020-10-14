<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersTable extends Migration
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
			'frist_name'=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
				'null'			=> TRUE
			],
			'last_name'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
				'null'			=> TRUE
			],
			'email'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'password'	=> [
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
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
