<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    protected $k;
    protected $validation;

    public function __construct() {
        helper(['form', 'url']);

        $this->validation = \Config\Services::validation();
        $this->k = new \App\Models\Kategori();
    }

    public function add()
    {
        if ($this->request->getMethod() == 'post') {

            $data = [
                'k'             => $this->request->getPost('k'),
            ];
            
            if ($this->validation->run($data, 'kategori')) {
                $this->k->save($data);

                session()->setFlashdata('success', 'kategori berhasil ditambahkan');
                return redirect()->to(base_url('admin/buku/kategori'))->withInput();
            } else {
                session()->setFlashdata('error', 'kategori gagal ditambahkan');
                return redirect()->to(base_url('admin/buku/kategori'))->withInput();
            }

        } else {
            return redirect()->to(base_url('admin/buku/kategori'));
        }
    }

    public function action($kode = null)
    {
        if ($this->request->getMethod() == 'delete') {
            $this->k->delete($kode);
            session()->setFlashdata('success', 'kategori berhasil dihapus');

            return redirect()->to(base_url('admin/buku/kategori'));
        } elseif ($this->request->getMethod() == 'patch') {
            $data = [
                'idk'   => $this->request->getPost('idk'),
                'k'   => $this->request->getPost('k'),
            ];

            if ($this->validation->run($data, 'kategori')) {
                $this->k->save($data);

                session()->setFlashdata('success', 'kategori berhasil diubah');
                return redirect()->to(base_url('admin/buku/kategori'));
                
            } else {
                session()->setFlashdata('error', 'kategori gagal diubah');
                return redirect()->to(base_url('admin/buku/kategori'));
            }


        } else {
            return redirect()->to(base_url('admin/buku/kategori'));
        }
    }

}
