<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
require_once '../config/Conexion.php';

?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content" style="background:white;">
    <h1 class="box-title text-center"> </h1>
    <div class="row">
      <div class="col-md-12">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- /.box-header -->
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h4 style="font-size:35px;" class="text-center"><strong>
                        <?php
                        require_once '../config/Conexion.php';
                        $registros = mysqli_query($conexion, "select count(*) as cantidad from orden where turno_envio='A'") or
                          die("Problemas en el select:" . mysqli_error($conexion));

                        $reg = mysqli_fetch_array($registros);
                        echo  $reg['cantidad'];
                        ?>
                      </strong></h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Turno A</a>
                </div>
              </div><!-- /.box -->
              <!--Fin centro -->

              <!-- Inicio  -->
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h4 style="font-size:35px;" class="text-center"><strong>

                        <?php
                        require_once '../config/Conexion.php';
                        $registros = mysqli_query($conexion, "select count(*) as cantidad from orden where turno_envio='B'") or
                          die("Problemas en el select:" . mysqli_error($conexion));
                        $reg = mysqli_fetch_array($registros);
                        echo  $reg['cantidad'];
                        ?>
                      </strong></h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Turno B</a>
                </div>
              </div><!-- /.box -->
              <!--Fin centro -->

              <!-- Inicio  -->
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="small-box bg-green">
                  <div class="inner">
                    <h4 style="font-size:35px;" class="text-center"><strong>

                        <?php
                        require_once '../config/Conexion.php';
                        $registros = mysqli_query($conexion, "select count(*) as cantidad from orden where turno_envio='C'");
                        $reg = mysqli_fetch_array($registros);
                        echo  $reg['cantidad'];
                        ?>

                      </strong></h4>
                    </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Turno C </a>
                </div>
              </div><!-- /.box -->
              <!--Fin centro -->
              <!-- Inicio  -->
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h4 style="font-size:35px;" class="text-center"><strong>
                        <?php
                        require_once '../config/Conexion.php';
                        $registros = mysqli_query($conexion, "select count(*) as cantidad from orden where turno_envio='D'") or
                          die("Problemas en el select:" . mysqli_error($conexion));
                        $reg = mysqli_fetch_array($registros);
                        echo  $reg['cantidad'];
                        ?>
                      </strong></h4>
                    </p>
                  </div>
                  <a href="#" class="small-box-footer">Turno D </a>
                </div>
              </div><!-- /.box -->
              <!--Fin centro -->
              <!-- LISTA DE QUEJAS DE LOS CLIENTES QUE SOLO SE PODRAN VER LOS USUARIOS  -->

              <!-- ADMINISTRADORES TENDRAN LA FUNCION DE PODER ELIMINARLAS -->
              <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <!-- /.box-header -->
                    <!-- LISTA DE USUARIOS -->

                    <!-- /.box-header -->
                    <!-- centro -->
                    <!-- Tabla -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Numero de orden</th>
                          <th>Tipo de orden</th>
                          <th>Tipo de problema</th>
                          <th>Turno de envio</th>
                          <th>Fecha de envio</th>
                          <th>opciones</th>

                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <!-- Fin Tabla -->
                  </div>
                </div>
              </section>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <?php
      require 'footer.php';
      ?>
      <script type="text/javascript" src="scripts/orden.js"></script>
      <?php
      ob_end_flush();
      ?>