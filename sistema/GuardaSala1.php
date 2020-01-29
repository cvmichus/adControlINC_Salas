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

    $secc="sala";
    $HoraGuardado = date("H:i:s");

    $NombrePHP = $_POST["nombre"]; 
    $descripcionPHP = $_POST["descripcion"]; 
    $fechaPHP = $_POST["fecha"]; 
    $horainicioPHP = $_POST["horainicio"]; 
    $horafinPHP = $_POST["horafin"]; 
    $usuarioPHP = $_POST["usuario"]; 
    $estatusPHP = $_POST["estatus"]; 
    $salaPHP = $_POST["sala"]; 
    $horaaltaPHP = $_POST["horaalta"]; 

    if(empty($NombrePHP)){
        echo $res="2";
    }else{
      echo $NombrePHP;
    } 

/*
       $sqlGuardaSala1 = "{call sp_INCSALAS_GuardaEventos (?,?,?,?,?,?,?,?,?)}";
          $parametros = array(
          array($NombrePHP, SQLSRV_PARAM_IN),
          array($descripcionPHP, SQLSRV_PARAM_IN),
          array($fechaPHP, SQLSRV_PARAM_IN),
          array($horainicioPHP, SQLSRV_PARAM_IN),
          array($horafinPHP, SQLSRV_PARAM_IN),
          array($usuarioPHP, SQLSRV_PARAM_IN),
          array($estatusPHP, SQLSRV_PARAM_IN),
          array($salaPHP, SQLSRV_PARAM_IN),
          array($horaaltaPHP, SQLSRV_PARAM_IN) );

              $qryGuardaSala1 = sqlsrv_query($con,$sqlGuardaSala1,$parametros);

               if ( $qryGuardaSala1 ){ echo $res = 1; }
               else{ 
                //echo $res = 0;
                  if( ($errors = sqlsrv_errors() ) != null) {
                        foreach( $errors as $error ) {
                        echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                        echo "code: ".$error[ 'code']."<br />";
                        echo "message: ".$error[ 'message']."<br />";
                        echo $NombrePHP ; echo "<br>";
                        echo $res = 0;
                        }
                        }
                }
*/
    ?>