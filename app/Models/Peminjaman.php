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
        $this->where(['userid' => $uid, 'peminjaman_status' => $s]);
        return $this->findAll();
    }

    public function getByStatus($stts)
    {
        $this->where('peminjaman_status', $stts);
        return $this->findAll();
    }

    public function getByKode($kode)
    {
        $this->where('kode_peminjaman', $kode);
        return $this->first();
    }

    public function monthStat()
    {
        $this->select(['MONTH(tanggal_pinjam) AS bulan', 'COUNT(tanggal_pinjam) AS jml']);
        $this->where('tanggal_pinjam >= NOW() - INTERVAL 1 YEAR');
        $this->groupBy('MONTH(tanggal_pinjam)');
        $q = $this->get();

        return $q->getResultArray();
    }
}
