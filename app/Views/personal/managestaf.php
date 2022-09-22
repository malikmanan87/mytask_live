<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">+ Staf</li>
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
                            <h3 class="card-title">Add/Alter/Remove Technician Access</h3>
                        </div>
                        <div class="card-body">
                            <table id="example4" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Current Access</th>
                                        <th>Change Access To:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $item) : ?>
                                        <tr align="center">
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['email'] ?></td>
                                            <td>
                                                <?php
                                                if ($item['level'] == '3') {
                                                    echo "<span class='badge badge-pill badge-danger'>Administrator</span>";
                                                } else {
                                                    echo "<span class='badge badge-pill badge-warning'>Technician</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url() ?>/setaccess/<?= $item['id'] ?>/3"><span class="badge badge-pill badge-danger">Administrator</span></a> |
                                                <a href="<?= base_url() ?>/setaccess/<?= $item['id'] ?>/2"><span class="badge badge-pill badge-warning">Technician</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table><em>** Access lvl : 3-Admin, 2-Technician</em>
                            <hr>
                            <form action="<?= base_url('/addnewstaf') ?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-3">
                                        <input type="text" class="form-control" placeholder="Staf Email" id="newemail" name="newemail" required>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <select class="form-control" id="newaccess" name="newaccess">
                                            <option value="2">Technician</option>
                                            <option value="3">Administrator</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <button type="submit" class="btn btn-primary">[+] Add Staf</button>
                                    </div>
                                </div>
                            </form>
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

<!-- script datatable dipanggil didalam template master (view/layout/master) -->
<!-- sweetalert -->
<?php
$session = session();
if ($session->existed) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'warning',
            title: 'That email already registered in system, please use other email.'
        })
    </script>
<?php } elseif ($session->successaccess) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
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
            title: 'Success change into new acces level.'
        })
    </script>
<?php } elseif ($session->failedaccess) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'warning',
            title: 'Fail change access.'
        })
    </script>
<?php } else {
}
?>

<?= $this->endSection() ?>