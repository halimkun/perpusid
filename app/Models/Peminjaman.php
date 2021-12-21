<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $insertID         = 37129;
    protected $allowedFields    = ['kode_peminjaman', 'tanggal_pinjam', 'tanggal_kembali', 'peminjaman_status', 'kode_buku', 'userid'];

}
