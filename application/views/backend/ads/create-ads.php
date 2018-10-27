<!-- Konten Wrapper -->

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url('backend/ads') ?>">Wisata</a></li>
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
              Data Table Iklan 
              <!-- <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a> -->
            </div>
            <div class="card-body">
              <?php echo form_open_multipart('ads/simpan');?>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="title" type="text" id="namawisata" class="form-control" placeholder="Nama Iklan" required="required" autofocus="autofocus">
                    <label for="namawisata">Nama Iklan</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select id="wisata" class="js-select form-control" name="kategori">
                      <option> - Pilih kategori terkait - </option>
                      <?php 
                        foreach ($kategoris as $kategori) {
                          ?>
                          <option value="<?php echo $kategori['idcat'] ?>"><?php echo $kategori['namecat'] ?></option>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select id="wisata" class="js-select form-control" name="idmaininfo">
                      <option> - Pilih Wisata terkait - </option>
                      <?php 
                        foreach ($wisatas as $wisata) {
                          ?>
                          <option value="<?php echo $wisata['idmaininfo'] ?>"><?php echo $wisata['title'] ?></option>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                </div>
            </div>
          </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" required="" placeholder="Deskripsi terkait" required="" rounded-0" id="desc" name="desc" rows="3"></textarea>
                <label for="desc"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" placeholder="Alamat terkait" required="" rounded-0" id="alamat" name="alamat" rows="3"></textarea>
                <label for="alamat"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="tiket" type="text"  id="weekday" class="form-control" placeholder="Harga Tiket Masuk" required="required">
                    <label for="weekday">HTM</label>
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="notelp" type="text"  id="notelp" class="form-control" placeholder="No Telepon" required="required">
                      <label for="notelp">No Telepon</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="link" type="url"  id="link" class="form-control" placeholder="Link Maps" required="required">
                      <label for="link">Link | <i>ex : https://maps.google.com</i></label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="gambar" type="file"  id="gambar" class="form-control" placeholder="" required="required">
                      <label for="gambar"></label>
                    </div>
                  </div>
                </div>
              </div>
            <button class="btn btn-primary btn-block" href="">Tambah</button>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- <!-- /#wrapper -->

      <script>
        $(document).ready(function() { $(".js-select").select2(); });
    </script>