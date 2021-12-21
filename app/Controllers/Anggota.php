<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Anggota extends BaseController
{

    protected $user;
    protected $buku;

    public function __construct()
    {
        $this->user = new \App\Models\UserModel();
        $this->buku = new \App\Models\Buku();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function dashboard()
    {
        $data = [
            "title"     => "User Home | PERPUSID",
            "segment"   => $this->request->uri->getSegments(),
        ];

        return view('user/home', $data);
    }

    public function profile($uname)
    {
        $data = [
            "title"     => "Profile Home | PERPUSID",
            "segment"   => $this->request->uri->getSegments(),
            "user"      => $this->user->getUserByUsername($uname)
        ];

        return view('user/profile', $data);
    }

    public function books()
    {
        $data = [
            "title"     => "List Buku | PERPUSID",
            "segment"   => $this->request->uri->getSegments(),
            "buku"      => $this->buku->findAll()
        ];

        return view('user/books', $data);
    }
}
