<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Complaint Report</li>
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
                            <h3 class="card-title">List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>subject</th>
                                        <th>msg</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (is_array($result) || is_object($result)) { ?>
                                        <?php foreach ($result as $item) : ?>
                                            <tr>
                                                <td><?= $item['id'] ?></td>
                                                <td><?= $item['name'] ?></td>
                                                <td><?= $item['email'] ?></td>
                                                <td><?= $item['subject'] ?></td>
                                                <td><?= $item['msg'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($item['status'] == 0) {
                                                        echo "New!";
                                                    } elseif ($item['status'] == 1) {
                                                        echo "In-Progress";
                                                    } elseif ($item['status'] == 2) {
                                                        echo "Completed";
                                                    } else
                                                        echo "Invalid Code";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($item['status'] == 0) { ?>
                                                        <a href="<?= base_url('/fix') ?>/<?= $item['id'] ?>/1" class="btn btn-sm btn-primary">Attend</a>
                                                    <?php } elseif ($item['status'] == 1) { ?>
                                                        <a href="<?= base_url('/fix') ?>/<?= $item['id'] ?>/2" class="btn btn-sm btn-warning">Fixed</a>
                                                    <?php } else {
                                                        echo "completed";
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php } else {
                                    } ?>
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