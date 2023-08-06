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
                    <h3 class="card-title">Task Details By :
                        <span class="badge badge-dark">
                            <a href="mailto:<?= $result['created_by'] ?>"> <?= $result['created_by'] ?></a> <?php if ($_SESSION['access'] == 3 or $_SESSION['access'] == 2) echo '(IC NO : ' . $result['ic_by'] ?> )
                            <!-- HANYA ADMIN DAN TECH BLH TGK IC NUMBER -->
                        </span>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('/attend') . '/' . $result['id'] ?>" method="post">
                        <input type="hidden" name="emailattendee" value="<?php $session = session();
                                                                            echo $session->email ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control form-control-sm" type="text" value="<?= $result['location'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User</label>
                                    <input class="form-control form-control-sm" type="text" value="<?= $result['temp_user'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Phone Ext. / (+60)</label>
                                    <input class="form-control form-control-sm" type="text" value="<?= $result['phone'] ?>" readonly>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Action Taken / Progress - <em><i>by technician</i></em></label>
                                    <textarea class="form-control" rows="3" placeholder="Please contact admin if action/progress not appear." readonly><?= $result['progress'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>File/Image name: <em><i><?= $result['filename'] ?></i></em></label><br>
                                    <img src="<?= base_url('/uploads') ?>/<?= $result['filename'] ?>" title="<?= $result['filename'] ?>" class="img-fluid" alt="Responsive image"><br>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <strong>Hi! <?= $cbname = str_replace('@unisza.edu.my', '', $result['created_by']); ?>,</strong> please click <button type="button" class="btn btn-sm btn-success">Completed</button> button below if the issues has been resolved, Thank You.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php
                        // papar jika status 1
                        if ($result['status'] == 1 and $result['attendee'] == $session->email) { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Action Taken <small>-by technician</small></label>
                                        <textarea class="form-control" rows="3" name="progress" placeholder="Please click [Update Progress] red button below after insert the actions." required><?= $result['progress'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                        } ?>
                        <?php
                        if ((($session->access == '3')) and $result['status'] == 0) { ?>
                            <hr>
                            <div class="row col-sm-12">
                                <div class="col-sm-2">
                                    <label>**Assign To Technician- <em>jika kosong, sistem automatik ambil email siapa yang klik butang "Attend" dibawah.</em></label>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="assign">
                                        <option value="">------ FT19 ------</option>
                                        <option value="syukerimohamad@unisza.edu.my">SYUKERI</option>
                                        <option value="msayutizakaria@unisza.edu.my">SAYUTI</option>
                                        <option value="aminfahmihashim@unisza.edu.my">AMIN</option>
                                        <option value="asrulnizamrizuan@unisza.edu.my">ASRUL</option>
                                        <option value="nikzaimnar@unisza.edu.my">ZAIM</option>
                                        <option value="wfairawhamid@unisza.edu.my">FAIRA</option>
                                        <option value="" disabled>------ FA29 ------</option>
                                        <option value="mekrogayahhussin@unisza.edu.my">MEK</option>
                                        <option value="malikmanan@unisza.edu.my">MALIK</option>
                                        <option value="ashabulyamin@unisza.edu.my">YAMIN</option>
                                        <option value="hasnawihashim@unisza.edu.my">HASNAWI</option>
                                        <option value="supiantawang@unisza.edu.my">SUPIAN</option>
                                        <option value="syedafaizjaafar@unisza.edu.my">SYED</option>
                                        <option value="" disabled>------ F41 ------</option>
                                        <option value="zulfazryzulkafeli@unisza.edu.my">ZULFAZRY</option>
                                        <option value="adib@unisza.edu.my">ADIB RAHIMI</option>
                                    </select>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3"><em>info : ** is optional input.</em></div>
                            </div>
                            <hr>
                        <?php } else {
                        } ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <?php
                                    echo "<a class='btn btn-primary' href='" . base_url('/') . "'>< Back</a>";

                                    if ($result['status'] == 0) { //kes baru
                                        echo "<button type='submit' class='btn btn-light'>Attend</button>";
                                    } elseif ($result['status'] == 1 and $result['attendee'] == $session->email) { //dlm proses tech

                                        echo "<button type='submit' class='btn btn-danger'>Update Progress</button>";
                                    } else {
                                    }

                                    if ($result['status'] == 1 and $result['attendee'] == $session->email and $result['progress'] !== '') {
                                        echo "<a class='btn btn-warning' href='" . base_url('/completedbytech') . "/" . $result['id'] . "' role='button'>Completed by Tech</a>";
                                    } else {
                                    }

                                    if ($result['status'] == 11 and $result['created_by'] == $session->email) { //dlm proses tech
                                        echo "<a class='btn btn-success' href='" . base_url('/completed') . "/" . $result['id'] . "' role='button'>Completed</a>";
                                    }

                                    if ($result['status'] == 0 and $session->access == '3') { //dlm proses tech
                                        echo "<a class='btn btn-dark' href='" . base_url('/cancel') . "/" . $result['id'] . "' role='button'>Cancel By Admin</a>";
                                    }
                                    ?>
                                    <?php
                                    if ($session->access == "3") {
                                        echo "<a href='" . base_url('/toupdate') . "/" . $result['id'] . "' class='btn btn-info'>Update By Admin</a>";
                                    }
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
            title: 'Thank you, case status updated and in-progress.'
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
            title: 'info, status un-changed.'
        })
    </script>
<?php } elseif ($session->emailfailed) { ?>
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
            title: 'Sorry, Fail to send an email to technician. Please try again.'
        })
    </script>
<?php } else {
} ?>

<?= $this->endSection() ?>