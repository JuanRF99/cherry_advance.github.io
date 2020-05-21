<?php
defined ('BASEPATH') or exit('No direct script access allowed!');
if(!empty($this->session->userdata('nama')) && $this->session->userdata('rolecode') == 'ADM')
{
  redirect('adm');
}elseif (!empty($this->session->userdata('nama')) && $this->session->userdata('rolecode') == 'EMP') {
  redirect('emp');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cherry Advance</title>

  <script src="<?php echo asset_url() ?>js/jquery.js"></script>
  <script src="<?php echo asset_url() ?>js/bootstrap.min.js"></script>
  <link href="<?php echo asset_url() ?>/img/favicon.ico" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo asset_url()?>css/style.css">

</head>
<body class="bg-login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">

    <?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-dismissible alert-warning">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <p class="mb-0"><?php echo $this->session->flashdata('message');?></p>
    </div>
    <?php } ?>

  <div class="card-body p-0">
    <div class="row">
      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
            </div>
            <form action="<?php echo base_url('login/auth'); ?>" method="post" class="user">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username...">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-user btn-block">
              Login
              </button>
              <hr>
            </form>
            <hr>
          </div>
      </div>
    </div>
  </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
