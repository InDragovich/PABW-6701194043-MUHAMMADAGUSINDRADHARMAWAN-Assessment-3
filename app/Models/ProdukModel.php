<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['namaProduk', 'slug', 'hargaProduk', 'stokProduk', 'keteranganProduk', 'gambar'];

    public function getProduk($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function search($keyword)
    {
        return $this->table('produk')->like('namaProduk');
    }
}