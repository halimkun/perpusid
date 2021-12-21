<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'idk';
    protected $allowedFields    = ["idk", "k"];
    // protected $useSoftDeletes   = true;
    protected $useAutoIncrement = true;
    protected $insertID         = 9290;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getKategori($i = null)
    {
        return $this->findAll();

        if ($i == null) {
            return $this->findAll();
        }

        return $this->find($i);
    }
    
}
