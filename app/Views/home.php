<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          $session = session();
          if ($session->access == 1) {
            echo "<span class='badge badge-pill badge-light'>Guest</span>";
          } elseif ($session->access == 2) {
            echo "<span class='badge badge-pill badge-info'>Technician</span>";
          } else {
            echo "<span class='badge badge-pill badge-dark'>Admin</span>";
          }

          // use CodeIgniter\I18n\Time;
          // $myTime = new Time('now');
          // echo $myTime;

          // $encrypter = \Config\Services::encrypter();
          // $ciphertext = $encrypter->encrypt($myTime);
          // // echo $encrypter->decrypt($ciphertext);
          // echo $ciphertext;
          // $session = session();
          // echo "Welcome, ".$session->name;
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
                <h4>+ New Ticket</h4>
                <!-- <small><i>*create new case</i></small> -->
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
              <p>New Ticket</p>
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
              <p>In-progress & Pending verify</p>
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
              <h3 class="card-title">Task List</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-sm display nowrap">
                <thead>
                  <tr>
                    <th>Report ID</th>
                    <th>Device</th>
                    <th>Problem Description</th>
                    <th>Location</th>
                    <th>Created At</th>
                    <th>Assigned To</th>
                    <th>Progress</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $item) : ?>
                    <tr>
                      <th><?= $item['ticket_id'] ?></th>
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
                      <td><?= $item['location'] ?></td>
                      <td>
                        <?php
                        $datecreate = new DateTime($item['created_at']);
                        echo $datecreate->format('d/m/Y | h:i:s a | D');
                        if ($datecreate->format('d/m/Y') == date('d/m/Y')) {
                          echo "&nbsp;<span class='right badge badge-secondary'>Today!</span>";
                        } else {
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($item['attendee'] == null and $item['status'] != 3) {
                          echo "<i>Open</i>";
                        } elseif ($item['attendee'] == null and $item['status'] == 3 or $item['attendee'] != null and $item['status'] == 3) {
                          echo "<i>Canceled by System</i>";
                        } else
                          echo $item['attendee']
                        ?>
                      </td>
                      <td>
                        <!-- <div class="progress progress-xs"> -->
                          <?php
                          if ($item['status'] == 0) { //new case
                            // echo "<div class='progress-bar bg-primary' style='width: 25%' ></div>";
                            echo "<center><span class='right badge badge-primary'>New</span></center>";
                          } elseif ($item['status'] == 1) { //attend by  tech
                            // echo "<div class='progress-bar bg-warning' style='width: 50%' ></div>";
                            echo "<center><span class='right badge badge-warning'>In-Progress</span></center>";
                          } elseif ($item['status'] == 11) { //pending verify
                            // echo "<div class='progress-bar bg-warning' style='width: 75%' ></div>";
                            echo "<center><span class='right badge badge-warning'>In-Progress</span></center>";
                          } elseif ($item['status'] == 2) { //completed by user
                            // echo "<div class='progress-bar bg-success' style='width: 100%' ></div>";
                            echo "<center><span class='right badge badge-success'>Completed</span></center>";
                          } elseif ($item['status'] == 3) { //canceled
                            // echo "<div class='progress-bar bg-dark' style='width: 100%' ></div>";
                            echo "<center><span class='right badge badge-dark'>canceled</span></center>";
                          } else {
                          } //error
                          ?>
                        <!-- </div> -->
                      </td>
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
      title: 'Thank you, new ticket has been created.'
    })
  </script>
<?php } elseif ($session->signin) { ?>
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
      icon: 'info',
      title: 'Signed in successfully, welcome <?= $session->name ?>'
    })
  </script>
<?php } elseif ($session->cancelsuccess) { ?>
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
      icon: 'info',
      title: 'Cancel successfully! case completed!'
    })
  </script>
<?php } elseif ($session->completed) { ?>
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
      icon: 'info',
      title: 'Thank you, ticket <?= $session->name ?> completed!'
    })
  </script>
<?php } else {
} ?>

<?= $this->endSection() ?>