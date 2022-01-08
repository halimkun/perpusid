<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="card">

    <div class="card-header">
        <h4>Detail Buku</h4>
        <div class="card-header-action">
            <a href="/admin/buku/edit/<?= $buku['kode_buku'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
            <button class="btn btn-sm btn-danger" data-confirm="Woops . . !|Apakah anda yakin akan menghapus jurusan <hr> <h5><?= $buku['judul_buku'] ?></h5>" data-confirm-yes="var _0x3c6632=_0x2ff3;function _0x4d28(){var _0x4be5df=['344183QoOzAV','395343yqwNrx','1654344mTYKKR','4jPzHDk','/admin/buku/','4904490JJpZeC','2WnrHco','ajax','2041735AshAEn','done','2695BXnxvD','/buku/action/','489687OUuPTX','href','1854vcBWqv','DELETE'];_0x4d28=function(){return _0x4be5df;};return _0x4d28();}function _0x2ff3(_0x5de694,_0x7c3f86){var _0x4d28fd=_0x4d28();return _0x2ff3=function(_0x2ff3b5,_0x13dba0){_0x2ff3b5=_0x2ff3b5-0x132;var _0xa9fa65=_0x4d28fd[_0x2ff3b5];return _0xa9fa65;},_0x2ff3(_0x5de694,_0x7c3f86);}(function(_0x4fab8d,_0x5c3ac3){var _0x1968e2=_0x2ff3,_0x2159b3=_0x4fab8d();while(!![]){try{var _0x349ba5=parseInt(_0x1968e2(0x136))/0x1+parseInt(_0x1968e2(0x13c))/0x2*(parseInt(_0x1968e2(0x132))/0x3)+parseInt(_0x1968e2(0x139))/0x4*(-parseInt(_0x1968e2(0x13e))/0x5)+-parseInt(_0x1968e2(0x134))/0x6*(parseInt(_0x1968e2(0x140))/0x7)+-parseInt(_0x1968e2(0x138))/0x8+-parseInt(_0x1968e2(0x137))/0x9+parseInt(_0x1968e2(0x13b))/0xa;if(_0x349ba5===_0x5c3ac3)break;else _0x2159b3['push'](_0x2159b3['shift']());}catch(_0x243906){_0x2159b3['push'](_0x2159b3['shift']());}}}(_0x4d28,0x35ab5),$[_0x3c6632(0x13d)]({'url':_0x3c6632(0x141)+'<?= $buku['kode_buku'] ?>','type':_0x3c6632(0x135)})[_0x3c6632(0x13f)](function(){var _0x333700=_0x3c6632;location[_0x333700(0x133)]=_0x333700(0x13a);}));"><i class="fa fa-trash"></i></button>
        </div>
    </div>

    <div class="card-body">
        <?php if (empty($buku)) : ?>
            <div class="alert alert-secondary text-dark text-center">
                Buku tidak ditemukan
            </div>
        <?php else : ?>

            <div class="mt-0">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/imgs/cover/' . $buku['cover_buku']) ?>" alt="<?= $buku['judul_buku'] ?>" class="img-fluid mb-3">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless mb-3">
                            <tr>
                                <th>Judul</th>
                                <td><?= $buku['judul_buku'] ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?= $buku['kategori'] ?></td>
                            </tr>
                            <tr>
                                <th>Penulis</th>
                                <td><?= $buku['penulis_buku'] ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td><?= $buku['penerbit_buku'] ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td><?= $buku['tahun_terbit'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-3 pt-2">
                    <div class="section-title mt-0">Sinopsis</div>
                    <blockquote>
                        <?= $buku['sinopsis'] ?>
                    </blockquote>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<?php $this->endSection(); ?>