<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">New</li>
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
                    <h3 class="card-title">New Form</h3>
                </div>
                <div class="card-body">

                    <?php $validation = \Config\Services::validation(); ?>

                    <form action="<?= base_url('/create') ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Device Category</label>
                                    <select class="form-control" name="devcat">
                                        <option value="d1">PC</option>
                                        <option value="d2">Laptop</option>
                                        <option value="d3">Printer</option>
                                        <option value="d4">Scanner</option>
                                        <option value="d5">Photostat Machine</option>
                                        <option value="d6">Access Door</option>
                                        <option value="d7">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Problem Category</label>
                                    <select class="form-control" name="probcat">
                                        <option value="p1">Hardware</option>
                                        <option value="p2">Software</option>
                                        <option value="p3">Wifi</option>
                                        <option value="p4">Internet</option>
                                        <option value="p5">Ink/Toner</option>
                                        <option value="p6">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Problem Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="probdesc"></textarea>
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