<?php
 date_default_timezone_set("America/Mexico_City");
  session_start();
  ini_set("display_errors",0);
  include "../includes/bd.php";

  if (!$_SESSION['logued']) {
      header("../location:index.php");
      exit();
  }

    $Codigousuario = $_SESSION['CodUsuario'];
    $PerifilUsuario = $_SESSION['Perfil'];
    $UsuarioPHP = $_SESSION['Usuario'];
    $NombreUsuario =$_SESSION['Nombre'];
    $ApellidoP = $_SESSION['ApellidoP'];
    $ApellidoM = $_SESSION['ApellidoM'];

    $secc=="sala";
    $HoraGuardado = date("H:i:s");

            /*ADMIN*/
        if($PerifilUsuario == 0){
        ?>
        <style>
                #calendar {
        max-width: 800px;
    }
        </style>

           <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">SALA 1</h3>
                            <div class="comment-center">
                               
                               
                          
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">SALA 2</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. </span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        <?php

        }else  if($PerifilUsuario == 1){/*USUARIO*/
        ?>
           <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">SALA 1</h3>
                            <div class="comment-center">
                                <p>
                             <button type="button" class="btn btn-success" onclick="cargarDiv('#principal','form.php');" >ADD + </button>

                              <!-- data-toggle="modal" data-target="#exampleModal"-->
        
                                </p>
                                <?php
                                $codsala="1";
                                $sqlSala1 = "{call sp_INCSALAS_ObtenerEventosSalas (?)}";
                                $parametros = array(array($codsala, SQLSRV_PARAM_IN));
                                $qrySala1 = sqlsrv_query($con,$sqlSala1,$parametros);
                                while( $rowSala1 = sqlsrv_fetch_object( $qrySala1) ) {
                                ?>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5><?php echo utf8_encode($rowSala1->NombreEv); ?></h5> <span class="mail-desc"><?php echo  utf8_encode($rowSala1->DescripcionEv); ?>
                                        <br>
                                             Inicia : <?php echo $rowSala1->Hora_inicia->format('H:i:m-a'); ?> 
                                             Termina: <?php echo $rowSala1->Hora_final->format('H:i:m-a'); 
                                             ?>
                                              
                                            <br>
                                        </span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right"><?php echo  $rowSala1->FechaEv->format('d/m/Y');  ?></span></div>
                                </div>
                              <?php
                                }
                                ?>                               
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">SALA 2</h3>
                            <div class="comment-center">
                                
                                <?php
                                $codsala="2";
                                $sqlSala2 = "{call sp_INCSALAS_ObtenerEventosSalas (?)}";
                                $parametros = array(array($codsala, SQLSRV_PARAM_IN));
                                $qrySala2 = sqlsrv_query($con,$sqlSala2,$parametros);
                                while( $rowSala2 = sqlsrv_fetch_object( $qrySala2) ) {
                                ?>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                                </div>
                              <?php
                                }
                                ?>                               
                                
                            </div>
                        </div>
                    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Agregar Evento Sala 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="form-inline" method="get" id="formdata">
        <div class="form-group">
            <label for="nombre">Nombre Evento</label>
            <input type="text" class="form-control" id="nombre" iname="nombre"  aria-describedby="emailHelp" placeholder="Nombre Evento">
            <small id="emailHelp" class="form-text text-muted">favor de llenar este dato.</small>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea type="text" class="form-control" id="descripcion" iname="descripcion"  aria-describedby="emailHelp" placeholder="Descripcion"></textarea>
            <small id="emailHelp" class="form-text text-muted">favor de llenar este dato.</small>

        </div>

         <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" iname="fecha"  aria-describedby="emailHelp" placeholder="Fecha">
            <small id="emailHelp" class="form-text text-muted">favor de llenar este dato.</small>

        </div>

         <div class="form-group">
            <label for="horainicio">Hora inicio</label>
            <input type="time" class="form-control" id="horainicio" iname="horainicio"  aria-describedby="emailHelp" placeholder="Hora inicio">
            <small id="emailHelp" class="form-text text-muted">favor de llenar este dato.</small>

        </div>

         <div class="form-group">
            <label for="horafin">Hora Fin</label>
            <input type="time" class="form-control" id="horafin" iname="horafin"  aria-describedby="emailHelp" placeholder="Hora Fin">
            <small id="emailHelp" class="form-text text-muted">favor de llenar este dato.</small>

        </div>

             <input type="hidden" class="form-control" id="usuario" iname="usuario"  value="<?php echo $Codigousuario; ?>"> 
             <input type="hidden" class="form-control" id="estatus" iname="estatus"  value="1"> 
             <input type="hidden" class="form-control" id="sala" iname="sala"  value="1"> 
             <input type="hidden" class="form-control" id="horaalta" iname="horaalta"  value="<?php echo $HoraGuardado; ?>"> 
                
                   <input class="btn btn-primary" type="button" id="botonenviar" value="Guardar">

        </form>

        <div id="exito" style="display:none" class="alerta alerta-success" role="alerta">
                        La informacion se guardo con exito, puedes guardar otro evento 
                        </div>
                         <div id="vacio" style="display:none" class="alerta alerta-danger" role="alerta">
                        La informacion esta vacia
                        </div>
                        <div id="fracaso" style="display:none" class="alerta alerta-warning" role="alerta">
                        Se ha producido un error durante el envío de datos, Intentelo de Nuevo.
                        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        


   

      </div>
    </div>
  </div>
</div>

                </div>
        <?php
        }
        ?>
      

    