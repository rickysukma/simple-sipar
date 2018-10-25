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
              <!-- <a style="float: right;" href="<?php echo base_url('wisata/') ?>create_wisata" class="btn btn-primary btn-sm">Tambah</a> -->
            </div>
            <div class="card-body">
              <?php echo form_open_multipart('wisata/simpan');?>
                <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="title" type="text" id="namawisata" class="form-control" placeholder="Nama Tempat Wisata" required="required" autofocus="autofocus">
                    <label for="namawisata">Nama Tempat Wisata</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="kota">
                      <?php 
                        foreach ($kotas as $kota) {
                          ?>
                          <option value="<?php echo $kota['idcity'] ?>"><?php echo $kota['city'] ?></option>
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
                <textarea class="form-control" required="" placeholder="Deskripsi tempat" required="" rounded-0" id="desc" name="desc" rows="3"></textarea>
                <label for="desc"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea class="form-control" placeholder="Alamat wisata" required="" rounded-0" id="alamat" name="alamat" rows="3"></textarea>
                <label for="alamat"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="weekday" type="text"  id="weekday" class="form-control" placeholder="Harga Tiket Weekdays" required="required">
                    <label for="weekday">Tiket Weekdays</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="weekend" type="text" id="weekend" class="form-control" placeholder="Harga Tiket Weekend" required="required">
                    <label for="weekend">Tiket Weekend</label>
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
    <!-- /#wrapper