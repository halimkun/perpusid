<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        \Myth\Auth\Authentication\Passwords\ValidationRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $kategori = [
        'k' =>  [
            'rules'     => 'required|alpha_numeric_space|is_unique[kategori.k]',
            'errors'    => [
                'required'              => 'Kategori harus diisi',
                'alpha_numeric_space'   => 'Kategori tidak valid',
                'is_unique'             => 'Kategori sudah ada'
            ]
        ]
    ];

    public $user = [
        'kode'      => [
            'rules'     => 'required|is_unique[anggota.kode]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'is_unique'             => 'kode sudah terpakai',
            ]
        ],
        'nama'      => [
            'rules'     => 'required|alpha_numeric_space',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'alpha_numeric_space'   => '{field} tidak valid'
            ]
        ],
        'tgl_lahir'       => [
            'rules'     => 'required|valid_date[Y-m-d]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'valid_date'            => '{field} tidak valid'
            ]
        ],
        'email'     => [
            'rules'     => 'required|valid_email|is_unique[anggota.email]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'valid_email'           => '{field} tidak valid',
                'is_unique'             => '{field} sudah ada'
            ]
        ],
        'username'     => [
            'rules'     => 'required|is_unique[anggota.email]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'is_unique'             => '{field} sudah ada'
            ]
        ],
        'password'  => [
            'rules'     => 'required|min_length[8]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'min_length'            => 'minimal 8 karakter'
            ]
        ],
        'no_tlp'       => [
            'rules'     => 'required|min_length[11]|max_length[14]|is_unique[anggota.no_tlp]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'min_length'            => '{field} minimal 11 karakter',
                'max_length'            => '{field} minimal 14 karakter'
            ]
        ],
        'alamat'    => [
            'rules'     => 'required',
            'errors'    => [
                'required'              => '{field} wajib diisi'
            ]
        ],
        'jk'        => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => '{field} wajib diisi' 
            ]
        ],
    ];

    public $user_update = [
        'kode'      => [
            'rules'     => 'required',
            'errors'    => [
                'required'              => '{field} wajib diisi',
            ]
        ],
        'nama'      => [
            'rules'     => 'required|alpha_numeric_space',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'alpha_numeric_space'   => '{field} tidak valid'
            ]
        ],
        'tgl_lahir'       => [
            'rules'     => 'required|valid_date[Y-m-d]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'valid_date'            => '{field} tidak valid'
            ]
        ],
        'email'     => [
            'rules'     => 'required|valid_email|is_unique[anggota.email]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'valid_email'           => '{field} tidak valid',
                'is_unique'             => '{field} sudah ada'
            ]
        ],
        'username'     => [
            'rules'     => 'required|is_unique[anggota.username]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'is_unique'             => '{field} sudah ada'
            ]
        ],
        'password'  => [
            'rules'     => 'required|min_length[8]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'min_length'            => 'minimal 8 karakter'
            ]
        ],
        'no_tlp'       => [
            'rules'     => 'required|min_length[11]|max_length[14]|is_unique[anggota.no_tlp]',
            'errors'    => [
                'required'              => '{field} wajib diisi',
                'min_length'            => '{field} minimal 11 karakter',
                'max_length'            => '{field} minimal 14 karakter'
            ]
        ],
        'alamat'    => [
            'rules'     => 'required',
            'errors'    => [
                'required'              => '{field} wajib diisi'
            ]
        ],
        'jk'        => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => '{field} wajib diisi' 
            ]
        ],
    ];
}
