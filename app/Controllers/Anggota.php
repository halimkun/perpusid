<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Anggota extends BaseController
{

    protected $user;
    protected $buku;
    protected $peminjam;

    public function __construct()
    {
        $this->user     = new \App\Models\UserModel();
        $this->buku     = new \App\Models\Buku();
        $this->peminjam = new \App\Models\Peminjaman();
    }

    public function index()
    {
        return redirect()->to('/u/dashboard');
    }

    public function dashboard()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peminjaman');
        $builder->select('peminjaman.*, buku.judul_buku,');
        $builder->join('buku', 'peminjaman.kode_buku = buku.kode_buku');
        $builder->where('peminjaman.userid', user()->id);
        $q = $builder->get();

        $data = [
            "title"        => "User Home | PERPUSID",
            "segment"      => $this->request->uri->getSegments(),
            'pinjaman'     => $q->getResult('array'),
            'dikembalikan' => $this->peminjam->getBukuDikembalikanUser(user()->id, 1),
            "now"          => new Time('now', 'Asia/Jakarta')
        ];

        return view('user/home', $data);
    }

    public function profile()
    {
        $data = [
            "title"   => "Profile Home | PERPUSID",
            "segment" => $this->request->uri->getSegments(),
            "now"     => new Time('now', 'Asia/Jakarta'),
            "uagent"  => $this->request->getUserAgent()
        ];

        return view('user/profile', $data);
    }

    public function books()
    {
        $data = [
            "title"   => "List Buku | PERPUSID",
            "segment" => $this->request->uri->getSegments(),
            "buku"    => $this->buku->findAll()
        ];

        return view('user/books', $data);
    }

    public function req()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peminjaman');
        $builder->select('peminjaman.*, buku.judul_buku,');
        $builder->join('buku', 'peminjaman.kode_buku = buku.kode_buku');
        $builder->where(['peminjaman.userid' => user()->id, 'peminjaman.peminjaman_status' => 3]);
        $q = $builder->get();

        $data = [
            "title"           => "List Buku | PERPUSID",
            "segment"         => $this->request->uri->getSegments(),
            "buku"            => $this->buku->findAll(),
            'proses_pinjaman' => $q->getResult('array'),
        ];
        return view('user/req_buku', $data);
    }
}
