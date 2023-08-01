<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">New iSyifaa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-white">
                <div class="card-header">
                    <h3 class="card-title">iSyifaa Issue/s</h3>
                </div>
                <div class="card-body">

                    <?php $validation = \Config\Services::validation(); ?>

                    <form action="<?= base_url('/create2') ?>" method="post">
                        <input type="hidden" name="createdby" value="<?php $session = session();
                                                                        echo $session->email; ?>">
                        <input type="hidden" name="icby" value="<?php $session = session();
                                                                echo $session->nokp; ?>">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Location</label><em> eg; ward, room, department etc..</em>
                                    <input type="text" class="form-control" name="location2">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>User</label><em> eg; ali bin abu</em>
                                    <input type="text" class="form-control" name="user2" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Phone no. / ext</label><em> 0 for no data</em>
                                    <input type="number" class="form-control" name="phone2" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Problem Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="description2"></textarea>
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" href="<?= base_url('/'); ?>" role="button">
                                        < Back</a>
                                            <button type="submit" class="btn btn-success">Submit</button>
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

<?= $this->endSection() ?>