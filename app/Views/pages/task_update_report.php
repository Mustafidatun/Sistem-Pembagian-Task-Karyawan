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
            <h1 class="h3 mb-0 text-gray-800">Task</h1>
          </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Report</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputNamaKaryawan">ID Task</label>
                            <input type="text" class="form-control" id="exampleInputNamaKaryawan" placeholder="ID Task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamaKaryawan">Subject Task</label>
                            <input type="text" class="form-control" id="exampleInputNamaKaryawan" placeholder="Subject Task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamaKaryawan">Deskripsi Task</label>
                            <input type="text" class="form-control" id="exampleInputNamaKaryawan" placeholder="Deskripsi Task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamaKaryawan">Nama Karyawan</label>
                            <input type="text" class="form-control" id="exampleInputNamaKaryawan" placeholder="Nama Karyawan">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi Pengerjaan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputTempatLahir">Tanggal Pengerjaan dan Jam</label>
                            <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="exampleInputTempatLahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="col">
                                <div class='input-group date' id='datetimepicker4' placeholder="Tanggal Lahir">
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                    </span>                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control">
                                <option>Proses</option>
                                <option>Pending</option>
                                <option>Finish</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
  <script type="text/javascript">
        $(function() {              
           // Bootstrap DateTimePicker v4
           $('#datetimepicker4').datetimepicker({
                 format: 'DD/MM/YYYY'
           });
        });      
    </script>
</body>

</html>
