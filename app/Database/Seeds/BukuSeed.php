<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_buku'       => 4729423,
                'kode_buku'     => 'MLB61bd99fc7dbe8',
                'stok_buku'     => 7,
                'judul_buku'    => 'Machine Learning Basic',
                'sinopsis'      => 'Machine learning (ML) is a type of artificial intelligence (AI) that allows software applications to become more accurate at predicting outcomes without being explicitly programmed to do so. Machine learning algorithms use historical data as input to predict new output values.',
                'kategori'      => 'teknologi',
                'penulis_buku'  => 'Roudolph Russell',
                'penerbit_buku' => 'Gramedia',
                'tahun_terbit'  => '2018-01',
                'cover_buku'    => '1639815676_6692bd98d43cf0e3d5b6.jpg',
                'created_at'    => '2021-12-18 02:21:16',
                'updated_at'    => '2021-12-18 02:22:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729424,
                'kode_buku'     => 'MLFB61bd9a3b29d5f',
                'stok_buku'     => 10,
                'judul_buku'    => 'Machine Learning For Beginner',
                'sinopsis'      => 'Machine learning is the study of computer algorithms that can improve automatically through experience and by the use of data. It is seen as a part of artificial intelligence',
                'kategori'      => 'teknologi',
                'penulis_buku'  => 'CRIS SBASTIAN',
                'penerbit_buku' => 'Penerbit Adi',
                'tahun_terbit'  => '2013-01',
                'cover_buku'    => '1639815739_ee061d6b920416428e97.jpg',
                'created_at'    => '2021-12-18 02:23:16',
                'updated_at'    => '2021-12-18 02:24:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729425,
                'kode_buku'     => 'MLFBTM61bd9a9ce473e',
                'stok_buku'     => 15,
                'judul_buku'    => 'Machine Learning From Beginner To Master',
                'sinopsis'      => 'Machine learning is the science of getting computers to act without being explicitly programmed. In the past decade, machine learning has given us ...',
                'kategori'      => 'teknologi',
                'penulis_buku'  => 'SAMUAL HACK',
                'penerbit_buku' => 'Erlangga',
                'tahun_terbit'  => '2008-10',
                'cover_buku'    => '1639815836_c8d53a1fa5471732daff.jpg',
                'created_at'    => '2021-12-18 02:25:16',
                'updated_at'    => '2021-12-18 02:26:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729426,
                'kode_buku'     => 'BTNSOALA61bd9b1013616',
                'stok_buku'     => 14,
                'judul_buku'    => 'BREATH The New Science Of A Lost Art',
                'sinopsis'      => 'Science is the pursuit and application of knowledge and understanding of the natural and social world following a systematic methodology based on evidence',
                'kategori'      => 'sains',
                'penulis_buku'  => 'James Nestor',
                'penerbit_buku' => 'Gramedia',
                'tahun_terbit'  => '2012-05',
                'cover_buku'    => '1639815952_73b0c7c9401c704acb46.jpg',
                'created_at'    => '2021-12-18 02:27:16',
                'updated_at'    => '2021-12-18 02:28:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729427,
                'kode_buku'     => 'TEB61bd9b5106127',
                'stok_buku'     => 11,
                'judul_buku'    => 'The Earth Book',
                'sinopsis'      => 'Earth is our home planet. Scientists believe Earth and its moon formed around the same time as the rest of the solar system. Earth is the fifth-largest planet in the solar system. Its diameter is about 8,000 miles. And Earth is the third-closest planet to the sun',
                'kategori'      => 'sains',
                'penulis_buku'  => 'Miles Kelly',
                'penerbit_buku' => 'Erlangga',
                'tahun_terbit'  => '2019-03',
                'cover_buku'    => '1639816017_58737bc932038bec7c03.png',
                'created_at'    => '2021-12-18 02:29:16',
                'updated_at'    => '2021-12-18 02:30:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729428,
                'kode_buku'     => 'PWPE61bd9baaa475b',
                'stok_buku'     => 9,
                'judul_buku'    => 'Paper World Planet Earth',
                'sinopsis'      => 'Earth is our home planet. Scientists believe Earth and its moon formed around the same time as the rest of the solar system. Earth is the fifth-largest planet in the solar system. Its diameter is about 8,000 miles. And Earth is the third-closest planet to the sun',
                'kategori'      => 'sains',
                'penulis_buku'  => '-',
                'penerbit_buku' => 'BOMBOLAND',
                'tahun_terbit'  => '2020-07',
                'cover_buku'    => '1639816106_80ed44baf4b7fcebd0ba.jpeg',
                'created_at'    => '2021-12-18 02:31:16',
                'updated_at'    => '2021-12-18 02:32:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729429,
                'kode_buku'     => 'AHOTB61bd9bf1ee5d7',
                'stok_buku'     => 6,
                'judul_buku'    => 'A History Of The Bibel',
                'sinopsis'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas repudiandae sequi laudantium, ducimus laborum autem reprehenderit explicabo quaerat aliquid ipsam cumque, sapiente quidem illum enim, nulla officia voluptate in adipisci.',
                'kategori'      => 'sejarah',
                'penulis_buku'  => 'Jhon Barton',
                'penerbit_buku' => 'Penerbit Adi',
                'tahun_terbit'  => '1997-06',
                'cover_buku'    => '1639816177_542ce3d779e1d32fc85c.jpg',
                'created_at'    => '2021-12-18 02:33:16',
                'updated_at'    => '2021-12-18 02:34:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729430,
                'kode_buku'     => 'WH61bd9c453810b',
                'stok_buku'     => 14,
                'judul_buku'    => 'World History ',
                'sinopsis'      => 'World history or global history as a field of historical study examines history from a global perspective. It emerged centuries ago; leading practitioners ...',
                'kategori'      => 'sejarah',
                'penulis_buku'  => 'Krishna Reddy',
                'penerbit_buku' => 'Gramedia',
                'tahun_terbit'  => '2018-12',
                'cover_buku'    => '1639816261_0241a51d012624309ff2.jpg',
                'created_at'    => '2021-12-18 02:35:16',
                'updated_at'    => '2021-12-18 02:36:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729431,
                'kode_buku'     => 'WH4E61bd9c722874a',
                'stok_buku'     => 11,
                'judul_buku'    => 'World History 4Th Edition',
                'sinopsis'      => 'World history or global history as a field of historical study examines history from a global perspective. It emerged centuries ago; leading practitioners ...',
                'kategori'      => 'sejarah',
                'penulis_buku'  => 'Adam Brown',
                'penerbit_buku' => 'Republika',
                'tahun_terbit'  => '2021-06',
                'cover_buku'    => '1639816306_416d8b6bd841dd48651b.jpg',
                'created_at'    => '2021-12-18 02:37:16',
                'updated_at'    => '2021-12-18 02:38:16',
                'deleted_at'    => NULL
            ],
            [
                'id_buku'       => 4729432,
                'kode_buku'     => 'TBOHN61bd9cabd643b',
                'stok_buku'     => 14,
                'judul_buku'    => 'The Book Of Homeless Ness',
                'sinopsis'      => 'Homelessness is lacking stable and appropriate housing. People can be categorized as homeless if they are: living on the streets; moving between temporary shelters, including houses of friends, family and emergency accommodation; living in private boarding houses without a private bathroom or security of tenure',
                'kategori'      => 'sejarah',
                'penulis_buku'  => '-',
                'penerbit_buku' => 'Republika',
                'tahun_terbit'  => '2019-10',
                'cover_buku'    => '1639816363_bb0433a44ce309940ba0.jpg',
                'created_at'    => '2021-12-18 02:39:16',
                'updated_at'    => '2021-12-18 02:40:16',
                'deleted_at'    => NULL
            ]
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}
