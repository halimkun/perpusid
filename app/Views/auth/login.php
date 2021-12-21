<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>PERPUS<span class="text-primary">ID</span> <span class="font-weight-light">LOGIN</span></h4>
                </div>

                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= route_to('login') ?>" method="post">
                        <?= csrf_field() ?>
                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="form-group">
                                <label for="login" class="control-label"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="form-group">
                                <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label"><?= lang('Auth.password') ?></label>
                                <div class="float-right">
                                    <a href="/forgot" class="text-small">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>


                        <?php if ($config->allowRemembering) : ?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" <?php if (old('remember')) : ?> checked <?php endif ?> tabindex="3" id="remember-me">
                                    <label class="custom-control-label" for="remember-me"><?= lang('Auth.rememberMe') ?></label>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                <?= lang('Auth.loginAction') ?>
                            </button>
                        </div>
                    </form>
                    <?php if ($config->activeResetter) : ?>
                        <div class="mt-3 text-muted text-center">
                            <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($config->allowRegistration) : ?>
                <div class="text-muted text-center">
                    Don't have an account? <a href="<?= route_to('register') ?>">Create One</a>
                </div>
            <?php endif; ?>

            <div class="simple-footer">
                <hr>
                Copyright &copy; Stisla 2018
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>