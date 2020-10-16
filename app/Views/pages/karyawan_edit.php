<?php
// print_r($karyawan);
foreach($karyawan as $row):
  $id_karyawan   = $row->id_karyawan;
  $nama_karyawan = $row->nama_karyawan;
  $jenis_kelamin = $row->jenis_kelamin;
  $tempat_lahir  = $row->tempat_lahir;
  $tgl_lahir     = $row->tgl_lahir;
  $no_telp       = $row->no_telp;
  $alamat        = $row->alamat;
  $id_divisi     = $row->id_divisi;
endforeach;

?>
<?= view('layout/header'); ?> 
<?= view('layout/sidebar_admin'); ?>
   
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Location topbar -->
        <?= view('layout/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
          </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Karyawan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?php echo base_url("/karyawan/edit/$id_karyawan"); ?>" method="post">
                        <div class="form-group">
                            <label for="inputNamaKaryawan">Nama Karyawan</label>
                            <input type="text" class="form-control" id="inputNamaKaryawan" <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?> placeholder="Nama Karyawan" value="<?= $nama_karyawan;?>" name="nama_karyawan">
                            <div class="invalid-feedback d-block">
                              <?= $validation->getError('nama_karyawan'); ?>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <label for="exampleInputTempatLahir">Jenis Kelamin</label>
                            <div class="row">
                            <!-- <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend> -->
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputJenisKelamin1" value="L" <?= ($jenis_kelamin == "L") ? "checked" : "";?>>
                                <label class="form-check-label" for="inputJenisKelamin1">
                                    Laki-Laki
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputJenisKelamin2" value="P" <?= ($jenis_kelamin == "P") ? "checked" : "";?>>
                                <label class="form-check-label" for="inputJenisKelamin2">
                                    Perempuan
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                        <label for="inputTempatLahir">Tempat Tanggal Lahir</label>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" id="inputTempatLahir" <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?> placeholder="Tempat Lahir" name="tempat_lahir" value="<?= $tempat_lahir;?>">
                                <div class="invalid-feedback d-block">
                                  <?= $validation->getError('tempat_lahir'); ?>
                                </div>
                              </div>
                            <div class="col">
                                <div class='input-group date' id='datetimepicker4' placeholder="Tanggal Lahir">
                                    <!-- <input type='text' class="form-control"/> -->
                                    <input id="datepicker" width="276" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                    </span>                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNoTelp">No. HP</label>
                            <input type="tel" class="form-control" id="inputNoTelp" <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?> placeholder="No Telp" name="no_telp" value="<?= $no_telp;?>">
                            <div class="invalid-feedback d-block">
                              <?= $validation->getError('no_telp'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat">Alamat</label>
                            <textarea class="form-control" id="inputAlamat" <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> rows="3" name="alamat"><?= $alamat;?></textarea>
                            <div class="invalid-feedback d-block">
                              <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDivisi">Divisi</label>
                            <select id="inputDivisi" class="form-control" name="id_divisi">
                              <?php foreach($divisi as $row): ?>
                                  <option value="<?= $row->id_divisi; ?>" <?= ($row->id_divisi == $id_divisi) ? "selected" : "";?>><?= $row->divisi; ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="edit" value="Edit"></input>
                    </form>
                </div>
              </div>
            </div> 

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Location Footer -->
      <?= view('layout/footer'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
  <!-- <script>
      $('#datepicker').datepicker({
          uiLibrary: 'bootstrap4'
      });
  </script> -->
  <script type="text/javascript">
    $(function() {
        $("#dob").datepicker();
    });
  </script>
</body>

</html>
