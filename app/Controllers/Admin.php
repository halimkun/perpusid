<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use Myth\Auth\Authorization\GroupModel;

class Admin extends BaseController
{
    protected $user;
    protected $books;
    protected $kategori;
    protected $peminjam;
    protected $groups;
    protected $validation;

    public function __construct()
    {
        $this->user       = new \App\Models\UserModel();
        $this->books      = new \App\Models\Buku();
        $this->kategori   = new \App\Models\Kategori();
        $this->peminjam   = new \App\Models\Peminjaman();
        $this->groups     = new GroupModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return redirect()->to(base_url('admin/dashboard'));
    }

    public function dashboard()
    {
        $data = [
            "title"   => "Dashboard | PERPUSID",
            "segment" => $this->request->uri->getSegments(),
            "cuser"   => count($this->user->findAll()),
            "cbooks"  => count($this->books->findAll()),
        "cpeminjaman" => count($this->peminjam->findAll())
        ];

        return view('admin/home', $data);
    }

    public function buku()
    {
        $data = [
            "title"   => "List Buku | PERPUSID",
            "segment" => $this->request->uri->getSegments(),
            "buku"    => $this->books->findAll()
        ];
        return view("admin/buku/all", $data);
    }

    public function buku_baru()
    {
        $data = [
            "title"      => "Tambah Buku | PERPUSID",
            'validation' => \Config\Services::validation(),
            "segment"    => $this->request->uri->getSegments(),
            "kategori"   => $this->kategori->findAll()
        ];

        return view("admin/buku/new", $data);
    }

    public function buku_detail($kode = null)
    {
        if ($kode != null) {
            $data = [
                "title"   => "Detail Buku | PERPUSID",
                "segment" => $this->request->uri->getSegments(),
                "buku"    => $this->books->getBuku($kode)->first()
            ];

            return view('admin/buku/detail', $data);
        } else {
            return redirect()->to(base_url('admin/buku'));
        }
    }

    public function buku_edit($kode = null)
    {
        if ($kode != null) {
            $data = [
                "title"      => "Edit Buku | PERPUSID",
                "segment"    => $this->request->uri->getSegments(),
                "buku"       => $this->books->getBuku($kode)->first(),
                'validation' => \Config\Services::validation(),
                "kategori"   => $this->kategori->findAll()
            ];

            return view('admin/buku/edit', $data);
        } else {
            return redirect()->to(base_url('admin/buku'));
        }
    }

    public function peminjaman()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peminjaman');
        $builder->select('peminjaman.*, users.username, users.firstname, users.lastname, buku.judul_buku, buku.kode_buku');
        $builder->join('buku', 'peminjaman.kode_buku = buku.kode_buku');
        $builder->join('users', 'peminjaman.userid = users.id');
        $q = $builder->get();

        $data = [
            "title"    => "Peminjam Buku | PERPUSID",
            "segment"  => $this->request->uri->getSegments(),
            "peminjam" => $q->getResult()
        ];

        return view("admin/peminjam/index", $data);
    }

    public function peminjaman_baru()
    {
        $data = [
            "title"    => "Peminjam Buku | PERPUSID",
            "segment"  => $this->request->uri->getSegments(),
            "peminjam" => $this->peminjam->findAll(),
            "users"    => $this->user->withGroup('anggota')->findAll(),
            "buku"     => $this->books->findAll()
        ];

        return view("admin/peminjam/add", $data);
    }

    public function peminjaman_request()
    {
        $data = [
            "title"    => "Peminjam Buku | PERPUSID",
            "segment"  => $this->request->uri->getSegments(),
            "peminjam" => $this->peminjam->findAll()
        ];

        return view("admin/peminjam/req", $data);
    }

    public function kategori()
    {
        $data = [
            "title"      => "Kategori Buku | PERPUSID",
            'validation' => \Config\Services::validation(),
            "segment"    => $this->request->uri->getSegments(),
            "kategori"   => $this->kategori->findAll()
        ];

        return view("admin/buku/kategori", $data);
    }

    public function users()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, email, username, firstname, lastname, phone, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $q = $builder->get();

        $data = [
            "title"   => "Home | PERPUSID",
            "segment" => $this->request->uri->getSegments(),
            "users"   => $q->getResult('array'),
            "groups"  => $this->groups->findAll()
        ];

        return view('admin/user/all', $data);
    }

    public function user_new()
    {
        $data = [
            "title"      => "Add New User | PERPUSID",
            "segment"    => $this->request->uri->getSegments(),
            "validation" => $this->validation,
        ];

        return view('admin/user/new', $data);
    }

    public function group()
    {
        if ($this->request->getMethod() == 'post') {
            
        } else {
            $data = [
                "title"      => "Add New User | PERPUSID",
                "segment"    => $this->request->uri->getSegments(),
                "validation" => $this->validation,
                "groups"     => $this->groups->findAll(),
            ];

            return view('admin/user/groups', $data);
        }
    }
}
