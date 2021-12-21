<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary">
                <div class="card-header">
                    <h4><?= lang('Auth.forgotPassword') ?></h4>
                </div>

                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <p class="text-muted"><?= lang('Auth.enterEmailForInstructions') ?></p>
                    <form action="<?= route_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="email"><?= lang('Auth.emailAddress') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; Stisla 2018
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>