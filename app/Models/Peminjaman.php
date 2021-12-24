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


    public function updateStts($data, $kode)
    {
        $this->set('peminjaman_status', $data);
        $this->where('kode_peminjaman', $kode);
        return $this->update();
    }

    public function getPeminjamanByUid($uid)
    {
        $this->where('userid', $uid);
        return $this->findAll();
    }

    public function getBukuDikembalikanUser($uid, $s)
    {
        $this->where(['userid'=>$uid, 'peminjaman_status' => $s]);
        return $this->findAll();
    }

}
