<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
                                        <th>Attendee / technician</th>
                                        <th style="text-align: center;">Current Month (<?php echo date("F Y"); ?>)</th>
                                        <th style="text-align: center;">Cumulative</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $item) : ?>
                                        <tr>
                                            <td><?= $item['attendee'] ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('/monthly') . '/' . base64_encode($item['attendee']) . '/' . $item['cur_month'] ?>"><span class="badge badge-pill badge-light"><?= $item['cur_ticket'] ?> ticket/s</span></a>
                                            </td>
                                            <td style="text-align: center;"><a href="<?= base_url("/cumulative") . '/' . base64_encode($item['attendee']) ?>"><span class="badge badge-pill badge-light"><?= $item['cum_ticket'] ?> ticket/s</span></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <!-- <a class="btn btn-primary" href="<?= base_url('/') ?>" role="button">
                                < Back</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection() ?>