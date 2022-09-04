<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Report</li>
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
                            <h3 class="card-title">Personal report</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Action taken</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $item) : ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['description'] ?></td>
                                            <td><?= $item['progress'] ?></td>
                                            <td><?= $item['created_by'] ?></td>
                                            <td><?= $item['created_at'] ?></td>
                                            <td>
                                                <?php
                                                if ($item['status'] == 1) { //inprogress
                                                    echo "<span class='badge badge-pill badge-warning'>In-Progress</span>";
                                                } elseif ($item['status'] == 2) { //completed
                                                    echo "<span class='badge badge-pill badge-success'>Completed</span>";
                                                } else {
                                                    echo "error";
                                                }
                                                ?>
                                            </td>
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