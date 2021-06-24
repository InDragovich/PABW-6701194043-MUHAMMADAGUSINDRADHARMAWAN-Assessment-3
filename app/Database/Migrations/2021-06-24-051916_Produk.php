<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'namaProduk'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'hargaProduk' => [
				'type' => 'INT',
				'constraint' => '16',
			],
			'stokProduk' => [
				'type' => 'INT',
				'constraint' => '3',
			],
			'keteranganProduk' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'gambar' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'constraint' => '255',
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('produk');
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}