<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="mt-3">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        <?= $cuser ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Buku</h4>
                    </div>
                    <div class="card-body">
                        <?= $cbooks ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pinjaman</h4>
                    </div>
                    <div class="card-body">
                        <?= $cpeminjaman ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">Month</a>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="182"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rincian Pinjaman</h4>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <span data-toggle="tooltip" title="dikembalikan">
                            <b class="text-success"><i class="fa fa-check-circle mr-2"></i></b><?= count($dikembalikan) ?> <strong>Kali</strong>
                        </span>
                    </div>
                    <div class="mb-2">
                        <span data-toggle="tooltip" title="dipinjamkan">
                            <b class="text-primary"><i class="fa fa-reply mr-2"></i></b><?= count($dipinjamkan) ?> <strong>Kali</strong>
                        </span>
                    </div>
                    <div class="mb-2">
                        <span data-toggle="tooltip" title="proses">
                            <b class="text-dark"><i class="fa fa-history mr-2"></i></b><?= count($proses) ?> <strong>Kali</strong>
                        </span>
                    </div>
                    <div class="mb-2">
                        <span data-toggle="tooltip" title="ditolak">
                            <b class="text-danger"><i class="fa fa-times-circle mr-2"></i></b><?= count($ditolak) ?> <strong>Kali</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

?>

<script>
    $(document).ready(function() {
        var bulan = [];
        var stat = [];

        <?php for ($i = 0; $i < count($mstat); $i++) { ?>
            bulan.push('<?= DateTime::createFromFormat('!m', $mstat[$i]['bulan'], new DateTimeZone('Asia/Jakarta'))->format('M') ?>')
            stat.push(<?= $mstat[$i]['jml'] ?>)
        <?php } ?>

        var statistics_chart = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(statistics_chart, {
            type: 'line',
            data: {
                labels: bulan,
                datasets: [{
                    label: 'Statistics Pinjaman Perbulan',
                    data: stat,
                    borderWidth: 5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }]
                },
            }
        });
    });
</script>

<?php $this->endSection(); ?>