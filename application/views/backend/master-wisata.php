<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Wisata</li>            
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Wisata 
              <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Wisata</th>
                      <th>Lokasi</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Wisata</th>
                      <th>Lokasi</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <!-- foreach wisata -->
                  <?php foreach ($wisatas as $wisata) {
                    ?>
                  <tbody style="font-size: 14px">
                    <tr>
                      <th><?php echo $wisata['title'] ?></th>
                      <th><a href="<?php echo $wisata['link'] ?>"><?php echo $wisata['address'] ?></a></th>
                      <th><?php echo $wisata['telp'] ?></th>
                      <th><?php echo $wisata['city'] ?></th>
                      <th>
                        <a class="fas fa-edit fa-fw" href="<?php echo base_url('wisata/edit/').$wisata['idmaininfo'] ?>"></a>
                        <a style="color: red" class="fas fa-trash fa-fw" data-toggle="modal" data-target="#hapusModal"></a>
                      </th>
                    </tr>
                  </tbody>
                    <!-- Delete Modal-->
                      <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a style="color: white" href="<?php echo base_url('wisata/delete/').$wisata['idmaininfo'] ?>" class="btn btn-danger">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
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