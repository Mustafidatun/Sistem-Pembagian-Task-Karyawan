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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Task</h6>
            </div>
            
            <div class="card-body">

            <ul class="nav justify-content-center nav nav-pills flex-column flex-sm-row">
              <li class="nav-item">
                <a class="nav-link active" href="#all">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#process">Process</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Finish</a>
              </li>
            </ul>
            <div class="mb-4"></div>

              <!-- Table all -->
              <div id="all" class="table-responsive" style="display:block;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Table Process  -->
              <div id="process" class="table-responsive" style="display:none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Process</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Process</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>  

           <!-- Table Pending  -->
              <div id="pending" class="table-responsive" style="display:none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Pending</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Process</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

           <!-- Table Finish  -->
              <div id="finish" class="table-responsive" style="display:none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Finish</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Process</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                  </tbody>
                </table>
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

<!-- OPTIONAL SCRIPTS -->
    <script type="text/javascript">
    
    var all     = document.getElementById('all');
    var process = document.getElementById('process');
    var pending = document.getElementById('pending');
    var finish  = document.getElementById('finish');

	$( "input:radio[name=skema]" ).click(function() {
	var skemais = $("input[name=skema]:checked").val();

	if( skemais == 1){
                skemaA.style.visibility='visible';
                skemaA1.style.visibility='visible';
                skemaA.style.display ='block';
                skemaA1.style.display ='block';
                skemaB.style.visibility='hidden';
                skemaB1.style.visibility='hidden';
                skemaB.style.display ='none';
                skemaB1.style.display ='none';
                skemaC.style.visibility='hidden';
                skemaC1.style.visibility='hidden';
                skemaC.style.display ='none';
                skemaC1.style.display ='none';
    }else if(skemais == 2){
            skemaA.style.visibility='hidden';
            skemaA1.style.visibility='hidden';
            skemaA.style.display ='none';
            skemaA1.style.display ='none';
            skemaB.style.visibility='visible';
            skemaB1.style.visibility='visible';
            skemaB.style.display ='block';
            skemaB1.style.display ='block';
            skemaC.style.visibility='hidden';
            skemaC1.style.visibility='hidden';
            skemaC.style.display ='none';
            skemaC1.style.display ='none';
    }else if(skemais == 3){
            skemaA.style.visibility='hidden';
            skemaA1.style.visibility='hidden';
            skemaA.style.display ='none';
            skemaA1.style.display ='none';
            skemaB.style.visibility='hidden';
            skemaB1.style.visibility='hidden';
            skemaB.style.display ='none';
            skemaB1.style.display ='none';
            skemaC.style.visibility='visible';
            skemaC1.style.visibility='visible';
            skemaC.style.display ='block';
            skemaC1.style.display ='block';
    }else{
            skemaA.style.display ='none';
            skemaA1.style.display ='none';
            skemaB.style.display ='none';
            skemaB1.style.display ='none';
            skemaC.style.display ='none';
            skemaC1.style.display ='none';
    }
	});
  
</script>
</body>

</html>
