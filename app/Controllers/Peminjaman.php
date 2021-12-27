<?php

namespace App\Controllers;

use App\Models\Buku as BukuModel;
use App\Models\Peminjaman as ModelsPeminjaman;

class Peminjaman extends BaseController
{
    protected $peminjam;
    protected $buku;

    public function __construct()
    {
        $this->peminjam = new ModelsPeminjaman();
        $this->buku     = new BukuModel();
    }

    public function new()
    {
        if ($this->request->getMethod() == 'get') {
            return redirect()->to('/admin/peminjaman');
        }

        // get wakti sekarang
        $now = date('Y-m-d');

        // validation rules
        $rules = [
            'buku'  => 'required',
            'user'  => 'required',
        ];

        // check tanggal kosong atau tidak
        if (!empty($this->request->getPost('tanggal_kembali'))) {
            $kembali = $this->request->getPost('tanggal_kembali');
            $rules['tanggal_kembali'] = 'valid_date[Y-m-d]';
        } else {
            $kembali = date('Y-m-d', strtotime($now . '+7 day'));
        }

        /** status peminjaman
         * 1 dikembalikan
         * 2 dipinjamkan
         * 3 proses
         * 0 ditolak 
         **/
        if (in_groups('anggota')) {
            $data = [
                'kode_peminjaman'   => uniqid(),
                'kode_buku'         => $this->request->getPost('buku'),
                'userid'            => $this->request->getPost('diu'),
                'tanggal_pinjam'    => $now,
                'tanggal_kembali'   => $kembali,
                'peminjaman_status' => 3
            ];

            $rules = [
                'buku'  => 'required',
                'diu'  => 'required',
            ];
        } else {
            $data = [
                'kode_peminjaman'   => uniqid(),
                'kode_buku'         => $this->request->getPost('buku'),
                'userid'            => $this->request->getPost('user'),
                'tanggal_pinjam'    => $now,
                'tanggal_kembali'   => $kembali,
                'peminjaman_status' => 2
            ];
        }

        // lakukan validasi
        if (!$this->validate($rules)) {
            redirect()->to('/admin/peminjaman/new')->withInput()->with('validation', \Config\Services::validation());
        }

        // jika input gagal redirect
        if (!$this->peminjam->save($data)) {
            redirect()->to('/admin/peminjaman/new')->withInput()->with('validation', \Config\Services::validation());
        }

        session()->setFlashdata('success', 'Peminjam berhasil ditambahkan');

        if (in_groups('anggota')) {
            return redirect()->to('/u/books/req');
        } else {
            return redirect()->to('/admin/peminjaman');
        }
    }

    public function update()
    {
        if ($this->request->getMethod() == 'get') {
            return redirect()->to('/admin/peminjaman');
        }

        $data = [
            'id_peminjam'     => $this->request->getPost('peminjaman'),
            'tanggal_pinjam'  => $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getPost('tanggal_kembali')
        ];

        if (!$this->peminjam->update($this->request->getPost('peminjaman'), $data)) {
            session()->setFlashdata('error', 'Gagal update peminjaman');
            return redirect()->to('/admin/peminjaman/'.$this->request->getPost('kode'));
        }

        session()->setFlashdata('success', 'Berhasil update peminjaman');
        return redirect()->to('/admin/peminjaman/'.$this->request->getPost('kode'));
    }

    public function update_stts()
    {
        if ($this->request->getMethod() == 'get') {
            return redirect()->to('/admin/peminjaman');
        }

        if ($this->peminjam->updateStts($this->request->getPost('status'), $this->request->getPost('kode'))) {
            
            // get current stok
            $current_stok = $this->buku->where(['kode_buku' => $this->request->getPost('kode_buku')])->first();
            $stok_up = $current_stok['stok_buku'] + 1;
            $stok_down = $current_stok['stok_buku'] - 1;

            if ($this->request->getPost('status') == 1) {
                $this->buku->stokUp($this->request->getPost('kode_buku'), $stok_up);
            } elseif ($this->request->getPost('status') == 2) {
                $this->buku->stokDown($this->request->getPost('kode_buku'), $stok_down);
            }

        } else {
            session()->setFlashdata('error', 'Gagal update status peminjaman');
            return redirect()->to('/admin/peminjaman');
        }

        session()->setFlashdata('success', 'Berhasil update status peminjaman');
        return redirect()->to('/admin/peminjaman/'.$this->request->getPost('kode'));
    }

    public function stokUp($kode, $cstok)
    {
    }
}
