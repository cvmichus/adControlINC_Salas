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

    $secc="home";


?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Perfil</th>
                <th>Fecha Alta</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$sqlUsuarios = "{call sp_INCSALAS_ObtenerUsuarios ()}";
				$parametros = array();
				$qryUsuarios = sqlsrv_query($con,$sqlUsuarios);
				while( $rowUsuarios = sqlsrv_fetch_object( $qryUsuarios) ) {
            	$CodUsuario = $rowUsuarios->CodUsuario;
            	$Usuario = $rowUsuarios->Usuario;
            	$Nombre = $rowUsuarios->Nombre;
            	$Perfil = $rowUsuarios->Perfil;
            	$fecha_alta = $rowUsuarios->fecha_alta->format('d/m/Y'); 
        	?>
            <tr>
                <td><?php echo $CodUsuario; ?></td>
                <td><?php echo $Usuario; ?></td>
                <td><?php echo $Nombre; ?></td>
                <td><?php echo $Perfil; ?></td>
                <td><?php echo $fecha_alta; ?></td>
                <td> </td>
            </tr>
			<?php
		     }
			?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Perfil</th>
                <th>Fecha Alta</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>