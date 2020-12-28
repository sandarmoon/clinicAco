
<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GP clinic</title>
  <!-- Favicon -->
  <link href="<?php echo e(asset('template/assets/img/brand/favicon.png')); ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital@1&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link href="<?php echo e(asset('template/assets/js/plugins/nucleo/css/nucleo.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset('template/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/assets/css/dataTables.css')); ?>"> -->
  <!-- CSS Files -->
  <link href="<?php echo e(asset('template/assets/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

 <!--  <link href="<?php echo e(asset('template/table/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"> -->


  <!-- <link href="<?php echo e(asset('template/assets/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet"> -->

  <link href="<?php echo e(asset('template/assets/css/mine.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('dist/css/select2.min.css')); ?>" rel="stylesheet" />
  
  <style type="text/css">
    @media (max-width: 720px){
        .profilemedia{
           text-align: center;
            margin-left: 183px;
            margin-right: 0px;
            margin-top: 0px;
            padding-top: 0px;
        }
    }

    .sfont{
      font-size: 0.875rem;
    }
    .my-td
    {
     max-width: 100px;
     overflow: hidden;
     text-overflow: ellipsis;
     white-space: nowrap;
    }
     .my-td:hover
    {
     
     overflow: visible;
    
     white-space: unset;
    }
    #more  {display:  none;}
    body{
      min-height: 100vh;
    }
    #page-content{
      flex:1 0 auto;
    }
    
  </style>
  <?php echo $__env->yieldContent('style'); ?>

</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <h3 class="text-white">MyanGP </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <h3 class="text-primary">MyanGP</h3>
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../index.html">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Doc</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/login.html">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-6 pt-lg-7">
      <div class="container mt-6">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome to  MyanGP Clinic</h1>
              <h3 class="text-white">Reset your password</h3>
             
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
   <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                   <form method="POST" action="<?php echo e(url('/reset_password_with_token')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="token" value="<?php echo e($token); ?>">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Reset Password')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <!--  <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer> -->
  </div>
 <!--   Core   -->
  <script src="<?php echo e(asset('template/assets/js/plugins/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="<?php echo e(asset('template/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script src="<?php echo e(asset('template/assets/datatables/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('template/assets/datatables/dataTables.bootstrap4.js')); ?>"></script>
  <!--   Optional JS   -->
  <script src="<?php echo e(asset('template/assets/js/plugins/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/assets/js/plugins/chart.js/dist/Chart.extension.js')); ?>"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--   Argon JS   -->
  <!-- <script src="<?php echo e(asset('template/assets/js/argon-dashboard.min.js?v=1.1.1')); ?>"></script> -->
  <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->

  <!--  <script src="<?php echo e(asset('template/table/datatables/jquery.dataTables.min.js')); ?>"></script> -->
  <!-- <script src="<?php echo e(asset('template/table/datatables/dataTables.bootstrap4.min.js')); ?>"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo e(asset('template/table/js/demo/datatables-demo.js')); ?>"></script> -->
  <script type="text/javascript" src=""></script>
  <script src="<?php echo e(asset('template/table/datatables/icon.js')); ?>"></script>
  <!-- <script src="<?php echo e(asset('dist/js/select2.min.js')); ?>"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  

  <script>


    // window.$('table').DataTable();
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

     
      
  </script>
  <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('script'); ?>

</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>