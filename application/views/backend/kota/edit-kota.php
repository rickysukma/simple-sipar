<?php foreach ($kotas as $kota) {
  # code...
 ?>
<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Kota</li>
            <li class="breadcrumb-item active">Tambah</li>             
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
              <i class="fas fa-map"></i>
              Data Table Kota 
              <!-- <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a> -->
            </div>
            <div class="card-body">
              <?php echo form_open_multipart('kota/simpan');?>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="kota" type="text" id="namawisata" class="form-control" placeholder="Nama Tempat Wisata" value="<?php echo $kota['city'] ?>" required="required" autofocus="autofocus">
                    <label for="namawisata">Nama Tempat Wisata</label>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" href="">Simpan</button>
              </form>
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
    <!-- /#wrapper -->
<?php } ?>