<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADVentas | www.incanatoit.com</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <link rel="stylesheet" href="public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="public/css/font-awesome.css" />
  <link rel="stylesheet" href="public/css/AdminLTE.min.css" />
  <link rel="stylesheet" href="public/css/blue.css" />
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>ADVentas</b></a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Ingrese sus datos de Acceso</p>
      <form method="post" id="frmAcceso" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group has-feedback">
          <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" />
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
          <span class="fa fa-key form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
              Ingresar
            </button>
          </div>
        </div>
      </form>
    </div>

    <?php if (isset($_SESSION['error_login'])) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error!</strong> <?php echo $_SESSION['error_login']; ?>
      </div>
    <?php endif; ?>

  </div>
</body>

<script src="public/js/jquery-3.1.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/bootbox.min.js"></script>
<script src="scripts/login.js" type="text/javascript"></script>

</html>