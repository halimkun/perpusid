<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Buku extends BaseController
{

    protected $k;
    protected $b;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url']);

        $this->k = new \App\Models\Kategori();
        $this->b = new \App\Models\Buku();
        $this->validation = \Config\Services::validation();
    }

    public function update()
    {
        if ($this->request->getFile('cover')->getError() == 4) {
            $img_rules = "max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/png,image/jpeg]";
        } else {
            $img_rules = 'uploaded[cover]|max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/png,image/jpeg]';
        }

        if (!$this->validate([
            'kode'     => [
                'rules'     => 'required|max_length[150]|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Judul Harus Diisi',
                ]
            ],
            'judul'    => [
                'rules'     => 'required|max_length[255]|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Judul Harus Diisi',
                ]
            ],
            'sinopsis'      => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Sinopsis Harus Diisi',
                ]
            ],
            'kategori'      => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Kategori Harus Diisi',
                ]
            ],
            'penulis'  => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Penulis Harus Diisi',
                ]
            ],
            'penerbit' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Penerbit Harus Diisi',
                ]
            ],
            'tahun' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Tahun terbit Harus Diisi',
                ]
            ],
            'cover' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Cover Harus dipilih',
                ]
            ],
            'cover'     => [
                'rules'     => $img_rules,
                'errors'    => [
                    'uploaded'  => 'Gambar harus dipilih',
                    'max_size'  => 'Max upload file 2Mb',
                    'is_image'  => 'Gambar tidak valid',
                    'mime_in'   => 'Gambar tidak valid'
                ]
            ]
        ])) {
            return redirect()->to(base_url('admin/buku/edit/' . $this->request->getPost('kode')))->withInput();
        }

        // upload
        if ($this->request->getFile('cover')->getError() == 4) {
            $file_name  = $this->request->getPost('old_img');
        } else {
            $img        = $this->request->getFile('cover');
            $file_name  = $img->getRandomName();
            $img->move('assets/imgs/cover', $file_name);
        }
        // get data
        $data = [
            'kode_buku'     => $this->request->getPost('kode'),
            'judul_buku'    => $this->request->getPost('judul'),
            'sinopsis'      => $this->request->getPost('sinopsis'),
            'kategori'      => $this->request->getPost('kategori'),
            'penulis_buku'  => $this->request->getPost('penulis'),
            'penerbit_buku' => $this->request->getPost('penerbit'),
            'tahun_terbit'  => $this->request->getPost('tahun'),
            'cover_buku'    => $file_name
        ];

        $this->b->saveUpdate($data);

        session()->setFlashdata('success', 'Buku Berhasil Diupdate');
        return redirect()->to(base_url('admin/buku'));
    }

    public function add()
    {
        if (!$this->validate([
            'kode'     => [
                'rules'     => 'required|max_length[150]|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Judul Harus Diisi',
                ]
            ],
            'judul'    => [
                'rules'     => 'required|max_length[255]|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Judul Harus Diisi',
                ]
            ],
            'sinopsis'      => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Sinopsis Harus Diisi',
                ]
            ],
            'kategori'      => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Kategori Harus Diisi',
                ]
            ],
            'penulis'  => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Penulis Harus Diisi',
                ]
            ],
            'penerbit' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Penerbit Harus Diisi',
                ]
            ],
            'tahun' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Tahun terbit Harus Diisi',
                ]
            ],
            'cover' => [
                'rules'     => 'required|alpha_numeric_punct',
                'errors'    => [
                    'required'  => 'Cover Harus dipilih',
                ]
            ],
            'cover'     => [
                'rules'     => 'uploaded[cover]|max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/png,image/jpeg]',
                'errors'    => [
                    'uploaded'  => 'Gambar harus dipilih',
                    'max_size'  => 'Max upload file 2Mb',
                    'is_image'  => 'Gambar tidak valid',
                    'mime_in'   => 'Gambar tidak valid'
                ]
            ]
        ])) {
            return redirect()->to(base_url('admin/buku/new'))->withInput();
        }

        $file   = $this->request->getFile('cover');
        $fn     = $file->getRandomName();
        $file->move('assets/imgs/cover', $fn);

        $data = [
            'kode_buku'     => $this->request->getPost('kode') . uniqid(),
            'stok_buku'     => $this->request->getPost('stok'),
            'judul_buku'    => $this->request->getPost('judul'),
            'sinopsis'      => $this->request->getPost('sinopsis'),
            'kategori'      => $this->request->getPost('kategori'),
            'penulis_buku'  => $this->request->getPost('penulis'),
            'penerbit_buku' => $this->request->getPost('penerbit'),
            'tahun_terbit'  => $this->request->getPost('tahun'),
            'cover_buku'    => $fn
        ];

        // Simpan kedalam database
        $this->b->save($data);

        //flashdata pesan dihapus
        session()->setFlashdata('success', 'Buku Berhasil Ditambahkan!');
        return redirect()->to(base_url('admin/buku'));
    }

    public function action($kode = null)
    {
        if ($this->request->getMethod() == 'delete') {
            $this->b->delBuku($kode);

            session()->setFlashdata('success', 'Buku Berhasil Dihapus!');
            return redirect()->to(base_url('admin/buku'));
        } else {
            return redirect()->to(base_url('admin/buku'));
        }
    }
}
