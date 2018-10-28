<!-- Konten Wrapper -->
<?php foreach ($iklans as $iklan) {
?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url('backend/ads') ?>">Iklan</a></li>
            <li class="breadcrumb-item active">Edit</li>             
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
              <?php echo form_open_multipart('ads/update/'.$iklan['idinfoads'])?>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="title" type="text" id="namawisata" class="form-control" placeholder="Nama Iklan" value="<?php echo $iklan['title'] ?>" required="required" autofocus="autofocus">
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
                          if ($iklan['idcat'] == $kategori['idcat']) {
                            $selected = 'selected';
                          ?>
                          <option <?php echo $selected ?> value="<?php echo $kategori['idcat'] ?>"><?php echo $kategori['namecat'] ?></option>
                          <?php }else{ ?>
                            <option <?php echo $selected ?> value="<?php echo $kategori['idcat'] ?>"><?php echo $kategori['namecat'] ?></option>
                            <?php
                          }
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
                          if($iklan['idmaininfo'] == $wisata['idmaininfo']){
                            $selected = 'selected';
                          ?>
                          <option <?php echo $selected ?> value="<?php echo $wisata['idmaininfo'] ?>"><?php echo $wisata['title'] ?></option>
                          <?php
                        } else {
                          $select = ""; ?>
                          <option <?php $selected ?> value="<?php echo $wisata['idmaininfo'] ?>"><?php echo $wisata['title'] ?></option>
                      <?php  }
                      }
                      ?>

                    </select>
                  </div>
                </div>
            </div>
          </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" required="" placeholder="Deskripsi terkait" required="" rounded-0" id="desc" name="desc" rows="3"><?php echo $iklan['desc'] ?></textarea>
                <label for="desc"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" placeholder="Alamat terkait" required="" rounded-0" id="alamat" name="alamat" rows="3"><?php echo $iklan['address'] ?></textarea>
                <label for="alamat"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="tiket" type="text"  value="<?php echo $iklan['price'] ?>" id="weekday" class="form-control" placeholder="Harga Tiket Masuk" required="required">
                    <label for="weekday">HTM</label>
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="notelp" type="text" value="<?php echo $iklan['telp'] ?>" id="notelp" class="form-control" placeholder="No Telepon" required="required">
                      <label for="notelp">No Telepon</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="link" type="url" value="<?php echo $iklan['link'] ?>"  id="link" class="form-control" placeholder="Link Maps" required="required">
                      <label for="link">Link | <i>ex : https://maps.google.com</i></label>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-block" href="">Simpan</button>
              </form>
            </div>
          </div>
          <!-- table -->

          <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <img id="gambar_thumb" src="<?php echo base_url('assets/img/iklan/'.$iklan['image']) ?>" height="20%" width="20%" style="margin-bottom: 10px" class="img img-thumbnail">
                      <?php echo form_open_multipart('ads/update_gambar/'.$iklan['idinfoads']);?>
                      <input name="gambar" type="file"  id="gambar" class="" placeholder="" required="required">
                      <label for="gambar"></label>
                      <button class="btn btn-success">Upload</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

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

        document.getElementById("gambar").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("gambar_thumb").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
    </script>
<?php } ?>