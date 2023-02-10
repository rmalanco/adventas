<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();


require 'header.php';


?>

<link rel="stylesheet" href="../public/css/borrar.css">
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content" style="background:white;">
    <div class="row">
      <div class="col-md-12">
        <h1 class="box-title">Usuario
          <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
          <!-- <button class="btn btn-info" id="btnreporte"><i class="fa fa-clipboard"></i> Reporte</button></h1> -->
      </div>
      <!-- /.box-header -->
      <!-- Tabla -->
      <div class="panel-body table-responsive" id="listadoregistros">
        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>Nombre</th>
            <th>Email</th>
            <th>Login</th>
            <th>Permisos</th>
            <th>Opciones</th>

          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <!-- Fin Tabla -->

      <div class="panel-body" id="formularioregistros">
        <form name="formulario" id="formulario" method="POST">
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Nombre(*):</label>
            <input type="hidden" name="idusuario" id="idusuario">
            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email" required>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Login (*):</label>
            <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Login" required>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Clave (*):</label>
            <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Permisos:</label>
            <select class="form-control select-picker" name="permiso" id="permiso" maxlength="20" required>
              <option value="Admin">Administrador</option>
              <option value="CustomerService">CustomerService</option>
              <option value="Usuario">Usuario</option>
            </select>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>

              Guardar</button>

            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
          </div>
        </form>

      </div>
      <!--Fin centro -->
    </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<?php

require 'footer.php';

?>

<script type="text/javascript" src="scripts/usuario.js"></script>
<?php
ob_end_flush();
?>