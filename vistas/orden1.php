<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

require 'header.php';
require_once '../config/Conexion.php';
?>
<!--Contenido-->

  <!-- Main content -->
  <section class="content" style="background:white;">
    <div class="row">
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


              <h1 class="box-title">Orden
                <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                <form class="form-inline" method="POST" action="../reportes/generar_PDF.php">
                  <button type="submit" name="../reportes/generar_PDF" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>Generar PDF</button>
                </form>

            </div>
            <!-- /.box-header -->
            <!-- Tabla -->
            <div class="panel-body table-responsive" id="listadoregistros">
              <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Orden</th>
                  <th>Tipo de orden</th>
                  <th>Tipo de problema</th>
                  <th>Turno de envio</th>
                  <th>Fecha de envio</th>
                  <th>Opciones</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- Fin Tabla -->

            <!-- //FORMULARIO PARA REGISTRAR LA ORDEN -->
            <div class="panel-body" id="formularioregistros">
              <form name="formulario" id="formulario" method="POST">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Numero de orden(*):</label>
                  <input type="hidden" name="idorden" id="idorden">
                  <input type="text" class="form-control" name="orden" id="orden" maxlength="100" required>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Tipo de orden (*):</label>
                  <select class="form-control select-picker" name="tipo_orden" id="tipo_orden" maxlength="20" required>
                    <option value=""></option>
                    <option value="Single">Single</option>
                    <option value="Multipack">Multipack</option>
                  </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Tipo de problema (*):</label>
                  <select class="form-control select-picker" name="tipo_problema" id="tipo_problema" maxlength="20" required>
                    <option value=""></option>
                    <option value="Incompleta">Incompleta</option>
                    <option value="Faltante">Faltante</option>
                    <option value="Dañada">Dañada</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Turno de envio (*):</label>
                  <select class="form-control select-picker" name="turno_envio" id="turno_envio" maxlength="20" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Fecha de envio(*):</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" required>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Guardar</button>

                  <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
              </form>

            </div>
            <!-- //FORMULARIO PARA REGISTRAR LA ORDEN -->
            <!--Fin centro -->

          </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

<!--Fin-Contenido-->
<?php

require 'footer.php';
?>

<script type="text/javascript" src="scripts/orden.js"></script>
<?php

ob_end_flush();
?>