<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                    <h1 class="m-0">Contact Us</h1>
                </div>
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <form action="<?= base_url('/send')?>" method="POST">
            <div class="card">
                <div class="card-body row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <h2>Admin<strong>@MyTask</strong></h2>
                            <p class="lead mb-5">Hospital Pengajar Universiti Sultan Zainal Abidin
                                21300 Kuala Nerus Terengganu <br>
                                Phone: 09-668 8088 Fax: 09-668 7836
                            </p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="inputName" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">E-Mail</label>
                            <input type="email" name="inputEmail" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="inputSubject">Subject</label>
                            <input type="text" name="inputSubject" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">Message</label>
                            <textarea name="inputMessage" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send message">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>