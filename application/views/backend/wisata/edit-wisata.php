<?php foreach ($wisatas as $wisata) {

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
            <li class="breadcrumb-item active">Wisata</li>
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
              Data Table Wisata 
              <!-- <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a> -->
            </div>
            <div class="card-body">
              <?php echo form_open_multipart('wisata/simpan');?>
                <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="title" type="text" id="namawisata" class="form-control" placeholder="Nama Tempat Wisata" required="required" value="<?php echo $wisata->title ?>" autofocus="autofocus">
                    <label for="namawisata">Nama Tempat Wisata</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="kota" required="" placeholder="">
                      <option value=""> - Pilih wilayah - </option>
                      <?php
                        foreach ($kotas as $kota) {
                          if($wisata->idcity == $kota['idcity']){
                            $selected = 'selected';
                            ?>
                            <option <?php echo $selected ?> value="<?php echo $kota['idcity'] ?>"><?php echo $kota['city'] ?></option>
                          <?php
                          }else{
                            $selected = "";
                            ?>
                            <option <?php echo $selected ?> value="<?php echo $kota['idcity'] ?>"><?php echo $kota['city'] ?></option>
                            <?php
                          }
                          ?>
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
                <textarea class="form-control" required="" placeholder="Deskripsi tempat" required="" rounded-0" id="desc" name="desc" rows="3"><?php echo $wisata->desc ?></textarea>
                <label for="desc"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" placeholder="Alamat wisata" required="" rounded-0" id="alamat" name="alamat" rows="3"><?php echo $wisata->address ?></textarea>
                <label for="alamat"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="weekday" type="text"  id="weekday" class="form-control" placeholder="Harga Tiket Weekdays" value="<?php echo $wisata->weekday ?>" required="required">
                    <label for="weekday">Tiket Weekdays</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="weekend" value="<?php echo $wisata->weekend ?>" type="text" id="weekend" class="form-control" placeholder="Harga Tiket Weekend" required="required">
                    <label for="weekend">Tiket Weekend</label>
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="notelp" type="text"  id="notelp" class="form-control" placeholder="No Telepon" required="required" value="<?php echo $wisata->telp ?>">
                      <label for="notelp">No Telepon</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="link" type="url"  id="link" class="form-control" placeholder="Link Maps" required="required" value="<?php echo $wisata->link ?>">
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
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="gambar1" type="file"  id="gambar1" class="form-control" placeholder="">
                      <label for="gambar1"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input name="gambar2" type="file"  id="gambar" class="form-control" placeholder="">
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
    <!-- /#wrapper -->
<?php } ?>