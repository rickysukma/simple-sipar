<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-map"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_wisata; ?> Tempat Wisata!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('backend/wisata'); ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-hotel"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_hotel; ?> Hotel!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-concierge-bell"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_kuliner; ?> Info Kuliner!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_kuliner; ?> Event!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Wisata</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Wisata</th>
                      <th>Lokasi</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Wisata</th>
                      <th>Lokasi</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                    </tr>
                  </tfoot>
                  <!-- foreach wisata -->
                  <?php foreach ($wisatas as $wisata) {
                    ?>
                  <tbody>
                    <tr>
                      <th><?php echo $wisata['title'] ?></th>
                      <th><a href="<?php echo $wisata['link'] ?>"><?php echo $wisata['address'] ?></a></th>
                      <th><?php echo $wisata['telp'] ?></th>
                      <th><?php echo $wisata['city'] ?></th>
                    </tr>
                  </tbody>
                <?php } ?>
                  <!--  -->
                </table>
              </div>
            </div>
          </div>
          <!-- table -->

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website <?php echo date('Y') ?></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper