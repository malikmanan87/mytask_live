<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">In Progress</li>
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
                        <div class="card-header bg-warning">
                            <h3 class="card-title">In-Progress Case</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Device</th>
                                        <th>Description</th>
                                        <th>Assigned technician</th>
                                        <th>Logged At</th>
                                        <th>Progress</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $item) : ?>
                                        <tr>
                                            <th><?= $item['id'] ?></th>
                                            <td>
                                                <?php
                                                if ($item['cat_device'] == 'd1') {
                                                    echo "PC";
                                                } elseif ($item['cat_device'] == 'd2') {
                                                    echo "Laptop";
                                                } elseif ($item['cat_device'] == 'd3') {
                                                    echo "Printer";
                                                } elseif ($item['cat_device'] == 'd4') {
                                                    echo "Scanner";
                                                } elseif ($item['cat_device'] == 'd5') {
                                                    echo "Photostat Machine";
                                                } elseif ($item['cat_device'] == 'd6') {
                                                    echo "Access Door";
                                                } elseif ($item['cat_device'] == 'd7') {
                                                    echo "Others";
                                                } else {
                                                    echo "error";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <a href="<?= base_url('/read/' . $item['id']) ?>"><?= substr($item['description'], 0, 30) ?>..</a>
                                            </td>
                                            <td><?= substr($item['attendee'],0,-14) ?></td>
                                            <td>
                                                <?php
                                                $datecreate = new DateTime($item['created_at']);
                                                echo $datecreate->format('d/m/Y | h:i:s a | D');
                                                if ($datecreate->format('d/m/Y') == date('d/m/Y')) {
                                                    echo "&nbsp;<span class='right badge badge-warning'>new!</span>";
                                                } else {
                                                }
                                                ?>
                                            </td>                                            
                                            <td>
                                                <?php
                                                if ($item['status'] == 0) { //new case
                                                    $bar = "0%";
                                                } elseif ($item['status'] == 1) { //inprogress
                                                    $bar = "50%";
                                                } elseif ($item['status'] == 2) { //completed
                                                    $bar = "100%";
                                                } elseif ($item['status'] == 3) { //canceled
                                                    $bar = "100%";
                                                } else {
                                                } //error
                                                ?>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-dark" style="width: <?= $bar ?>;"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge text-white bg-dark"><?= $bar ?></span></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="<?= base_url('/') ?>" role="button">
                                < Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>