<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          // echo '<pre>';
          // var_dump($_SESSION);
          // echo '</pre>';
          ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content hidden-pc">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg">
          <a href="<?= base_url('/new') ?>">
            <div class="small-box bg-white">
              <div class="inner">
                <h3>+ New Ticket</h3>
                <small><i>*create new case</i></small>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $stat0; ?></h3>
              <p>New Case</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('/newcaselist/0') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $stat1; ?></h3>
              <p>In-progress</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('/inprogresslist/1') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $stat2; ?></h3>
              <p>Completed</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('/completelist/2') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?= $stat3; ?></h3>
              <p>Canceled</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('/canceledlist/3') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  </section>

  <section class="content hidden-mobile">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title">Case List</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Device</th>
                    <th>Description</th>
                    <th>Logged At</th>
                    <th>Progress</th>
                    <th>%</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $item) : ?>
                    <tr>
                      <th><?= $item['id'] ?></th>
                      <td>
                        <?php
                        if ($item['cat_device'] == 'd1') {
                          echo "PC";
                        } elseif ($item['cat_device'] == 'd2') {
                          echo "Laptop";
                        } elseif ($item['cat_device'] == 'd3') {
                          echo "Printer";
                        } elseif ($item['cat_device'] == 'd4') {
                          echo "Scanner";
                        } elseif ($item['cat_device'] == 'd5') {
                          echo "Photostat Machine";
                        } elseif ($item['cat_device'] == 'd6') {
                          echo "Access Door";
                        } elseif ($item['cat_device'] == 'd7') {
                          echo "Others";
                        } else {
                          echo "error";
                        }
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('/read/' . $item['id']) ?>"><?= substr($item['description'], 0, 30) ?>..</a>
                      </td>
                      <td>
                        <?php
                        $datecreate = new DateTime($item['created_at']);
                        echo $datecreate->format('d/m/Y | h:i:s a | D');
                        if ($datecreate->format('d/m/Y') == date('d/m/Y')) {
                          echo "&nbsp;<span class='right badge badge-warning'>new!</span>";
                        } else {
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($item['status'] == 0) { //new case
                          $bar = "0%";
                        } elseif ($item['status'] == 1) { //inprogress
                          $bar = "50%";
                        } elseif ($item['status'] == 2) { //completed
                          $bar = "100%";
                        } elseif ($item['status'] == 3) { //canceled
                          $bar = "100%";
                        } else {
                        } //error
                        ?>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-dark" style="width: <?= $bar ?>;"></div>
                        </div>
                      </td>
                      <td><span class="badge text-white bg-dark"><?= $bar ?></span></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
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
if ($session->create) { ?>
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