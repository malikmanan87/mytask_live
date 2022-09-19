<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Task Details By :
                        <span class="badge badge-dark">
                            <a href="mailto:<?= $result['created_by'] ?>"> <?= $result['created_by'] ?></a>
                        </span>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('/doupdate') ?>" method="post">
                        <input type="hidden" name="uid" value="<?= $result['id'] ?>">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Device Category</label>

                                    <select class="form-control" name="udevcat">
                                        <option value="d1" <?php if ($result['cat_device'] == "d1") {
                                                                echo "selected";
                                                            } ?>>PC</option>
                                        <option value="d2" <?php if ($result['cat_device'] == "d2") {
                                                                echo "selected";
                                                            } ?>>Laptop</option>
                                        <option value="d3" <?php if ($result['cat_device'] == "d3") {
                                                                echo "selected";
                                                            } ?>>Printer</option>
                                        <option value="d4" <?php if ($result['cat_device'] == "d4") {
                                                                echo "selected";
                                                            } ?>>Scanner</option>
                                        <option value="d5" <?php if ($result['cat_device'] == "d5") {
                                                                echo "selected";
                                                            } ?>>Photostat Machine</option>
                                        <option value="d6" <?php if ($result['cat_device'] == "d6") {
                                                                echo "selected";
                                                            } ?>>Access Door</option>
                                        <option value="d7" <?php if ($result['cat_device'] == "d7") {
                                                                echo "selected";
                                                            } ?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Problem Category</label>
                                    <select class="form-control" name="uprobcat">
                                        <option value="p1" <?php if ($result['cat_problem'] == "p1") {
                                                                echo "selected";
                                                            } ?>>Hardware</option>
                                        <option value="p2" <?php if ($result['cat_problem'] == "p2") {
                                                                echo "selected";
                                                            } ?>>Software</option>
                                        <option value="p3" <?php if ($result['cat_problem'] == "p3") {
                                                                echo "selected";
                                                            } ?>>Wifi</option>
                                        <option value="p4" <?php if ($result['cat_problem'] == "p4") {
                                                                echo "selected";
                                                            } ?>>Internet</option>
                                        <option value="p5" <?php if ($result['cat_problem'] == "p5") {
                                                                echo "selected";
                                                            } ?>>Ink/Toner</option>
                                        <option value="p6" <?php if ($result['cat_problem'] == "p6") {
                                                                echo "selected";
                                                            } ?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control form-control" type="text" value="<?= $result['location'] ?>" name="ulocation">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User</label>
                                    <input class="form-control form-control" type="text" value="<?= $result['temp_user'] ?>" name="utemp_user">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Phone Ext. / (+60)</label>
                                    <input class="form-control form-control" type="text" value="<?= $result['phone'] ?>" name="uphone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Problem Description</label>
                                    <textarea class="form-control" rows="3" name="udescription"><?= $result['description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <?php
                                    echo "<a class='btn btn-primary' href='" . base_url('/') . "/read/" . $result['id'] . "'>< Back</a>";
                                    echo "<button type='submit' class='btn btn-info'>Submit update</button>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- sweetalert -->
<?php
$session = session();
if ($session->updatesuccess) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Thank you, information has been updated.'
        })
    </script>
<?php } elseif ($session->updatefailed) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'danger',
            title: 'Sorry, information cannot be updated.'
        })
    </script>
<?php } else {
} ?>

<?= $this->endSection() ?>