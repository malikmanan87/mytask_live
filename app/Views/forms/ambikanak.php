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
                    <?php if (!$result) { ?>
                        <a href="<?= base_url('/saveambikanak'); ?>" class="btn btn-danger btn-lg">Keluar<br><i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    <?php } else { ?>
                        <a href="<?= base_url('/saveambikanak'); ?>" class="btn btn-primary btn-lg">Masuk<br><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $item) : ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['tarikh'] ?></td>
                                    <td><?= $item['masakeluar'] ?></td>
                                    <td><?= $item['masamasuk'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>