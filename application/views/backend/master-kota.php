<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">kota</li>            
          </ol>
           <?php
            $notif = $this->session->flashdata('notif');
            $gagal = $this->session->flashdata('gagal');
            if (isset($notif)) {
               ?>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> <?php echo $notif; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
               <?php
             }elseif(isset($gagal)){
                ?>
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed!</strong> <?php echo $gagal; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
               <?php
             } else {
              echo "";
             }
             ?>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table kota 
              <a style="float: right;" href="<?php echo base_url('kota/') ?>create_kota" class="btn btn-primary btn-sm">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataKota" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama kota</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody style="font-size: 14px">
                  <!-- foreach kota -->
                  <?php foreach ($kotas as $kota) {
                    ?>
                    <tr>
                      <th><?php echo $kota['city'] ?></th>
                      <th>
                        <a class="fas fa-edit fa-fw" href="<?php echo base_url('kota/edit/').$kota['idcity'] ?>"></a>
                        <a style="color: red" class="fas fa-trash fa-fw" data-toggle="modal" data-target="#hapusModal<?php echo $kota['idcity'] ?>"></a>
                      </th>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
                    <!-- Delete Modal-->
                    <?php foreach ($kotas as $hapus) {
                      ?>
                      <div class="modal fade" id="hapusModal<?php echo $hapus['idcity'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Yakin untuk menghapus data ini?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Pilih "<b>Hapus</b>" jika ingin menghapus data ini.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a style="color: white" href="<?php echo base_url('kota/delete/').$hapus['idcity'] ?>" class="btn btn-danger">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!--  -->
                  <?php } ?>
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