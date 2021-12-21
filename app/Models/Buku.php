<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id_buku';
    protected $useSoftDeletes   = true;
    protected $insertID         = 983290;
    protected $allowedFields    = ["kode_buku","judul_buku", "sinopsis", "kategori","penulis_buku","penerbit_buku","tahun_terbit", "cover_buku"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getBuku($kode = null)
    {
        if ($kode == null) {
            return $this->findAll();
        }

        return $this->where(["kode_buku" => $kode]);
    }

    public function saveUpdate($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->update($data, ["kode_buku" => $data['kode_buku']]);
    }
    
    public function delBuku($kode)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(["kode_buku" => $kode]);
    }

}
