<?= $this->extend('/user_template'); ?>
<?= $this->section('content'); ?>

<?php 
    $date = new DateTime(user()->created_at->toDateString());
    $now = new DateTime($now->toDateString());

    $age =$date->diff($now);
?>

<?php if (user()->phone[0] == 0) {
    $tel = str_replace(user()->phone[0], '62', user()->phone);
} ?>

<div class="card shadow">
    <div class="card-body p-5">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="/assets/imgs/avatar/<?= user()->profile ?>" alt="<?= user()->username ?>" class="img-fluid rounded-circle w-50">
                    <div class="mt-3">
                        <h4 style="font-weight: 400;">
                            <?= ucfirst(user()->firstname . " " . user()->lastname) ?>
                            <small><?= (user()->gender == 'L') ? '<i class="fa fa-mars"></i>' : '<i class="fa fa-venus"></i>' ?></small>
                        </h4>
                        <code><?= user()->username ?></code>
                    </div>
                </div>
                <div class="mb-3 mt-4 text-muted"><strong>Profile</strong></div>
                <div class="mb-3"><i class="fas fa-calendar mr-2"></i> <i><?= $age->d ?> Day</i> </div>

                <div class="mb-3 mt-4 text-muted"><strong>User Details</strong></div>
                <div class="mb-3"><i class="far fa-envelope mr-2"></i><a href="mailto:<?= user()->email ?>"><?= user()->email ?></a></div>
                <div class="mb-3"><i class="fa fa-phone mr-2"></i><a href="tel:+<?= $tel ?>"><?= user()->phone ?></a></div>
                <div class="mb-3"><i class="fa fa-birthday-cake mr-2"></i><?= user()->tgl_lahir ?></div>
                <div class="mb-3"><i class="fa fa-map-marker-alt mr-2"></i><?= user()->address ?></div>
            </div>
            <div class="col-md-8 bg-secondary">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>