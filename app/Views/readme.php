<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Read Me</li>
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
              <div class="card-header">
                <h3 class="card-title">System Notes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                          Side Menu Explaination                          
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                      <ul>
                            <li>+ New Ticket = user create ticket baru berkenaan masalah yang dihadapi.</li>
                            <li>Tech Report = laporan individu / teknisyen yang attend task tersebut.</li>
                            <li>Read Me plz! = nota berkenaan maklumat sistem</li>
                            <li>Logout = logout lah</li>
                          </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card card-info">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                          System Flow
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                      <img src="<?= base_url('/media/fc-mytask.png') ?>" alt="" width="25%">
                      </div>
                    </div>
                  </div>
                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                          Dashboard Menu Explaination
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                      <ul>
                        <li><img src="<?= base_url('/media/nt.png') ?>" alt="" width="20%"> <br>Senarai tiket baru yang dicreate oleh user</li><br>
                        <li><img src="<?= base_url('/media/inpf.png') ?>" alt="" width="20%"> <br>Senarai task yang telah diattend oleh teknisyen , samaada dlm progress atau telah diselesaikan masalah itu tetapi belum diverify oleh user (pending verify).</li><br>
                        <li><img src="<?= base_url('/media/c.png') ?>" alt="" width="20%"> <br>Senarai task yang telah selesai</li><br>
                        <li><img src="<?= base_url('/media/cancel.png') ?>" alt="" width="20%"> <br>Senarai yang dibatalkan oleh admin (disebabkan permintaan user @ lain2 sebab yang perlu).</li><br>
                      </ul>
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>