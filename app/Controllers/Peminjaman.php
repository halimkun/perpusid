<?php

namespace App\Controllers;

use App\Models\Peminjaman as ModelsPeminjaman;

class Peminjaman extends BaseController
{
    protected $peminjam;

    public function __construct()
    {
        $this->peminjam = new ModelsPeminjaman();
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
        $data = [
            'kode_peminjaman'   => uniqid(),
            'kode_buku'         => $this->request->getPost('buku'),
            'userid'            => $this->request->getPost('user'),
            'tanggal_pinjam'    => $now,
            'tanggal_kembali'   => $kembali,
            'peminjaman_status' => 2
        ];

        // lakukan validasi
        if (!$this->validate($rules)) {
            redirect()->to('/admin/peminjaman/new')->withInput()->with('validation', \Config\Services::validation());
        }

        // jika input gagal redirect
        if (!$this->peminjam->save($data)) {
            redirect()->to('/admin/peminjaman/new')->withInput()->with('validation', \Config\Services::validation());
        }

        session()->setFlashdata('success', 'Peminjam berhasil ditambahkan');
        return redirect()->to('/admin/peminjaman');
    }

    public function update_stts()
    {
        if ($this->request->getMethod() == 'get') {
            return redirect()->to('/admin/peminjaman');
        }

        // $data = [ 'peminjaman_status' => $this->request->getPost('status') ];
        if (!$this->peminjam->updateStts($this->request->getPost('status'), $this->request->getPost('kode'))) {
            session()->setFlashdata('error', 'Gagal update status peminjaman');
            return redirect()->to('/admin/peminjaman');
        }

        session()->setFlashdata('success', 'Berhasil update status peminjaman');
        return redirect()->to('/admin/peminjaman');

    }
}
