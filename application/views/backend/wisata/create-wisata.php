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
            <li class="breadcrumb-item active">Tambah</li>             
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-map"></i>
              Data Table Wisata 
              <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a>
            </div>
            <div class="card-body">
              <?php echo form_open_multipart('wisata/simpan');?>
                
                
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
    <!-- /#wrapper