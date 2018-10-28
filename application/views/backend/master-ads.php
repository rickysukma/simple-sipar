<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Iklan</li>            
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
              Data Table Iklan 
              <a style="float: right;" href="<?php echo base_url('ads/') ?>create_ads" class="btn btn-primary btn-sm">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataKota" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Iklan</th>
                      <th>Alamat</th>
                      <th>Kategori</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody style="font-size: 14px">
                  <!-- foreach kota -->
                  <?php foreach ($iklans as $iklan) {
                    ?>
                    <tr>
                      <th><?php echo $iklan['title'] ?></th>
                      <th><?php echo $iklan['address'] ?></th>
                      <th><?php echo $iklan['namecat'] ?></th>
                      <th><?php echo $iklan['telp'] ?></th>
                      <th>
                        <a class="fas fa-edit fa-fw" href="<?php echo base_url('ads/edit/').$iklan['idinfoads'] ?>"></a>
                        <a style="color: red" class="fas fa-trash fa-fw" data-toggle="modal" data-target="#hapusModal<?php echo $iklan['idinfoads'] ?>"></a>
                      </th>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
                    <!-- Delete Modal-->
                    <?php foreach ($iklans as $hapus) {
                      ?>
                      <div class="modal fade" id="hapusModal<?php echo $hapus['idinfoads'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a style="color: white" href="<?php echo base_url('ads/delete/').$hapus['idinfoads'] ?>" class="btn btn-danger">Hapus</a>
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
