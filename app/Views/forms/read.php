<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Read</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Case Details</h3>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('/attend') ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Device Category</label>
                                    <?php
                                    if ($result['cat_device'] == 'd1') {
                                        $cat_device = "PC";
                                    } elseif ($result['cat_device'] == 'd2') {
                                        $cat_device = "Laptop";
                                    } elseif ($result['cat_device'] == 'd3') {
                                        $cat_device = "Printer";
                                    } elseif ($result['cat_device'] == 'd4') {
                                        $cat_device = "Scanner";
                                    } elseif ($result['cat_device'] == 'd5') {
                                        $cat_device = "Photostat Machine";
                                    } elseif ($result['cat_device'] == 'd6') {
                                        $cat_device = "Access Door";
                                    } elseif ($result['cat_device'] == 'd7') {
                                        $cat_device = "Others";
                                    } else {
                                        $cat_device = "error";
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" value="<?= $cat_device ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Problem Category</label>
                                    <?php
                                    if ($result['cat_problem'] == 'p1') {
                                        $cat_problem = "Hardware";
                                    } elseif ($result['cat_problem'] == 'p2') {
                                        $cat_problem = "Software";
                                    } elseif ($result['cat_problem'] == 'p3') {
                                        $cat_problem = "Wifi";
                                    } elseif ($result['cat_problem'] == 'p4') {
                                        $cat_problem = "Internet";
                                    } elseif ($result['cat_problem'] == 'p5') {
                                        $cat_problem = "Ink/Toner";
                                    } elseif ($result['cat_problem'] == 'p6') {
                                        $cat_problem = "Others";
                                    } else {
                                        $cat_problem = "error";
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" value="<?= $cat_problem ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Problem Description</label>
                                    <textarea class="form-control" rows="3" readonly><?= $result['description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php
                        // papar jika status 1
                        if ($result['status'] == 1) { ?> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Action Taken <small>-by technician</small></label>
                                        <textarea class="form-control" rows="3" name=""></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                        } ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" href="<?= base_url('/'); ?>" role="button">
                                        < Back</a>
                                            <?php
                                            if ($result['status'] == 0) { //kes baru
                                                // echo "<button type='submit' class='btn btn-success'>Attend</button>";
                                                echo "<a href='".base_url('/attend').'/'.$result['id']."' class='btn btn-success'>Attend</a>";
                                            } elseif ($result['status'] == 1) { //dlm proses tech
                                                echo "<button type='submit' class='btn btn-danger'>Submit Action</button>";
                                            } else {
                                            }
                                            ?>
                                            <button type="reset" class="btn btn-info">Reset</button>
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
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Thank you, your case has been submitted.'
})
  </script>
<?php } else {
} ?>

<?= $this->endSection() ?>