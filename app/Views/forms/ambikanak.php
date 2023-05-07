<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Ambik anak</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    <?php
                    date_default_timezone_set('Asia/Kuala_Lumpur');
                    $timestamp = date('h:i:s a');
                    echo "<h1>$timestamp<h1>"; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Alasan:
                        </div>
                        <div class="col-9">
                            <select class="custom-select" name="alasan">
                                <option value="1">PRA</option>
                                <option value="2">KAFA</option>
                                <option value="3">Klinik</option>
                                <option value="4">Lain-lain</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <?php if (!$result) { ?>
                        <a href="<?= base_url('/saveambikanak'); ?>" class="btn btn-danger">Keluar <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    <?php } else { ?>
                        <a href="<?= base_url('/saveambikanak'); ?>" class="btn btn-primary">Masuk <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </i>
                        </a>
                    <?php } ?>

                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <table id="ambikanakdt" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th scope="col">Tarikh</th>
                                <th scope="col">Masa Keluar</th>
                                <th scope="col">Masa Masuk</th>
                                <th scope="col">Alasan</th>
                                <th scope="col">Hutang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $item) : ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['tarikh'] ?></td>
                                    <td><?= $item['masakeluar'] ?></td>
                                    <td><?= $item['masamasuk'] ?></td>
                                    <td>
                                        <?php
                                        if ($item['alasan'] == 1) {
                                            echo "PRA";
                                        } else if ($item['alasan'] == 2) {
                                            echo "KAFA";
                                        } else if ($item['alasan'] == 3) {
                                            echo "Klinik";
                                        } else {
                                            echo "Lain-lain";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $masakeluar = strtotime($item['masakeluar']);
                                        $masamasuk = strtotime($item['masamasuk']);
                                        $difference = $masamasuk - $masakeluar;
                                        $difference_minute = $difference / 60;
                                        echo intval($difference_minute) . ' minit';
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- sweetalert -->
<?php
$session = session();
if ($session->masuksuccess) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Rekod MASUK disimpan.'
        })
    </script>
<?php } elseif ($session->keluarsuccess) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Rekod KELUAR disimpan.'
        })
    </script>
<?php } elseif ($session->updatefailed) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Maaf, rekod MASUK telah wujud.'
        })
    </script>
<?php } else {
} ?>
<?= $this->endSection() ?>