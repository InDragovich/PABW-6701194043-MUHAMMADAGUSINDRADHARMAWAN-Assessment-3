<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        // $produk = $this->produkModel->findAll();

        $data = [
            'title' => 'Daftar Produk',
            'produk' => $this->produkModel->getProduk()
        ];

        // konek db tanpa model
        // $db = \Config\Database::connect();
        // $produk = $db->query("SELECT * FROM produk");
        // foreach ($produk->getResultArray() as $row) {
        //     d($row);
        // }

        // $produkModel = new ProdukModel();



        return view('produk/index', $data);
    }
    public function dashboard()
    {
        // $produk = $this->produkModel->findAll();

        $data = [
            'title' => 'Dashboard',
            'dashboard' => $this->produkModel->getProduk()
        ];
        return view('produk/dashboard', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Produk',
            'produk' => $this->produkModel->getProduk($slug)
        ];
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama produk ' . $slug . ' tidak ditemukan.');
        }
        return view('produk/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('produk/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'namaProduk' => [
                'rules' => 'required|is_unique[produk.namaProduk]',
                'errors' => [
                    'required' => 'Barang harus diisi.',
                    'is_unique' => 'Barang sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,3000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan format gambar',
                    'mime_in' => 'Yang anda pilih bukan format gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk/create')->withInput();
            return redirect()->to('/produk/create')->withInput();
        }

        //ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        //apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            //generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }



        $slug = url_title($this->request->getVar('namaProduk'), '-', true);

        $this->produkModel->save([
            'namaProduk' => $this->request->getVar('namaProduk'),
            'slug' => $slug,
            'hargaProduk' => $this->request->getVar('hargaProduk'),
            'stokProduk' => $this->request->getVar('stokProduk'),
            'keteranganProduk' => $this->request->getVar('keteranganProduk'),
            'gambar' => $namaGambar

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/produk');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $produk = $this->produkModel->find($id);

        //cek jika file gambarnya default
        if ($produk['gambar'] != 'default.jpg') {
            //hapus gambar
            unlink('img/' . $produk['gambar']);
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/produk');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Produk',
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProduk($slug)
        ];

        return view('produk/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'namaProduk' => [
                'rules' => 'required|is_unique[produk.namaProduk,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,3000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan format gambar',
                    'mime_in' => 'Yang anda pilih bukan format gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/produk/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        //cek gambar apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            //generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan gambar
            $fileGambar->move('img', $namaGambar);
            //hapus file lama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('namaProduk'), '-', true);

        $this->produkModel->save([
            'id' => $id,
            'namaProduk' => $this->request->getVar('namaProduk'),
            'slug' => $slug,
            'hargaProduk' => $this->request->getVar('hargaProduk'),
            'stokProduk' => $this->request->getVar('stokProduk'),
            'keteranganProduk' => $this->request->getVar('keteranganProduk'),
            'gambar' => $namaGambar

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/produk');
    }
}