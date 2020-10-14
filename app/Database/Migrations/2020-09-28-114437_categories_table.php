<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'			=> [
				'type'			=> 'INT',
				'constratint'	=> 5,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'name'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'created_at'	=> [
				'type'			=> 'DATETIME',
				'null'			=> TRUE
			],
			'updated_at'	=> [
				'type'			=> 'DATETIME',
				'null'			=> TRUE
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}


}
