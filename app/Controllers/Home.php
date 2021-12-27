<?php

namespace App\Controllers;

use App\Models\Buku as BukuModel;
use App\Models\Peminjaman;
use App\Models\UserModel;
use CodeIgniter\Test\Fabricator;

class Home extends BaseController
{

    protected $buku;
    protected $user;
    protected $pinjaman;

    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->user = new UserModel();
        $this->pinjaman = new Peminjaman();
    }

    public function index()
    {
        $buku = $this->buku->orderBy('id_buku', 'RANDOM')->findAll(6);
        $data = [
            "title"       => "Home | PERPUSID",
            "uagent"      => $this->request->getUserAgent(),
            "buku"        => $buku,
            "cbuku"       => $this->buku->findAll(),
            "cuser"       => $this->user->findAll(),
            "cpeminjaman" => $this->pinjaman->findAll(),
        ];
        return view('public/index', $data);
    }

    public function faker()
    {
        $p = new Peminjaman();
        $faker = \Faker\Factory::create('id_ID');
        // $faker = new Fabricator($p);

        dd($faker->dateTimeThisYear);
    }
}
