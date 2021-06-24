<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'namaProduk' => 'Tepung Terigu',
                'slug'    => 'tepung-terigu',
                'hargaProduk'    => '12000',
                'stokProduk'    => '20',
                'keteranganProduk'    => 'Ini Tepung Terigu',
                'gambar'    => 'tepungterigu.jpg',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'namaProduk' => 'Telur',
                'slug'    => 'telur',
                'hargaProduk'    => '2000',
                'stokProduk'    => '50',
                'keteranganProduk'    => 'Ini Telur',
                'gambar'    => 'telur.jpg',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'namaProduk' => 'Minyak Goreng',
                'slug'    => 'minyak-goreng',
                'hargaProduk'    => '20000',
                'stokProduk'    => '25',
                'keteranganProduk'    => 'Ini Minyak Goreng',
                'gambar'    => 'minyakgoreng.jpg',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO produk (namaProduk, hargaProduk, stokProduk, keteranganProduk, gambar, created_at, updated_at) 
        // VALUES(:namaProduk:, :slug:,:hargaProduk:,:stokProduk:,:keterangangProduk:,:gambar:,:created_at:,:updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('produk')->insert($data);
        $this->db->table('produk')->insertBatch($data);
    }
}