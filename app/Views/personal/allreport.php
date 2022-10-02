<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Top Achievement</h1>
                </div>
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col-md-3 col-sm">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url('/') ?>/media/r1.png" alt="User Avatar" class="img-size-100 mr-3 img-circle">
                    </div>
                    <div class="card-footer">
                        <table align="center">
                            <tbody>
                                <?php foreach ($resultrank1 as $resultrank1) : ?>
                                    <tr>
                                        <td>
                                            <footer class="blockquote-footer"><?= $resultrank1['attendee']; ?> (<?= $resultrank1['cum_ticket'] ?> Tickets)</footer>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url('/') ?>/media/r2.png" alt="User Avatar" class="img-size-100 mr-3 img-circle">
                    </div>
                    <div class="card-footer">
                        <table align="center">
                            <tbody>
                                <?php foreach ($resultrank2 as $resultrank2) : ?>
                                    <tr>
                                        <td>
                                            <footer class="blockquote-footer"><?= $resultrank2['attendee']; ?> (<?= $resultrank2['cum_ticket'] ?> Tickets)</footer>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url('/') ?>/media/r3.png" alt="User Avatar" class="img-size-100 mr-3 img-circle">
                    </div>
                    <div class="card-footer">
                        <table align="center">
                            <tbody>
                                <?php foreach ($resultrank3 as $resultrank3) : ?>
                                    <tr>
                                        <td>
                                            <footer class="blockquote-footer"><?= $resultrank3['attendee']; ?> (<?= $resultrank3['cum_ticket'] ?> Tickets)</footer>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">All technician report</h3>
                        </div>
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Attendee / technician</th>
                                        <th style="text-align: center;">Current Month (<?php echo date("F Y"); ?>)</th>
                                        <th style="text-align: center;">Total/Cumulative</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($result as $item) : ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $item['attendee'] ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('/monthly') . '/' . base64_encode($item['attendee']) . '/' . $item['cur_month'] ?>">
                                                    <span class="btn btn-sm btn-outline-dark">
                                                        <?php if ($item['cur_ticket'] == '') {
                                                            echo 0;
                                                        } else echo $item['cum_ticket'] ?> - Ticket/s</span></a>
                                            </td>
                                            <td style="text-align: center;"><a href="<?= base_url("/cumulative") . '/' . base64_encode($item['attendee']) ?>">
                                                    <span class="btn btn-sm btn-outline-dark">
                                                        <?php if ($item['cum_ticket'] == '') {
                                                            echo 0;
                                                        } else echo $item['cum_ticket'] ?> - Ticket/s</span></a></td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>