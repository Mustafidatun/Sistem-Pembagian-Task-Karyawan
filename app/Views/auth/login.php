<?php
  $session = session();
  $errors = $session->getFlashdata('errors');
?>

<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembagian Task Karyawan</title>
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <?php if($errors != null): ?>
            <div class="row">
              <div class="col-lg-12">
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Terjadi Kesalahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-danger"><?= $errors; ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal  -->

                <div class="alert alert-danger m-3" role="alert">
                  <h4 class="alert-heading">Terjadi Kesalahan</h4>
                  <hr>
                  <p class="mb-0">
                  <?= $errors; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php endif ?>

            <div class="row">
              <div class="col-lg-6 d-none d-lg-block m-auto">
              <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="<?= base_url('assets/img/login.svg'); ?>" alt="Gambar Login">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="/auth/login" method='post'>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?> id="inputUsername" placeholder="Username" name="username" value="<?= old('username'); ?>">
                      <div class="invalid-feedback d-block">
                        <?= $validation->getError('username'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> id="inputPassword" placeholder="Password" name="password" value="<?= old('password'); ?>">
                      <div class="invalid-feedback d-block">
                        <?= $validation->getError('password'); ?>
                      </div>
                    </div>
                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="/lupa_password">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  <script>
    //Untuk Pop Up
    // $(document).ready(function(){
    //     $("#myModal").modal('show');
    // });
</script>
</body>

</html>
