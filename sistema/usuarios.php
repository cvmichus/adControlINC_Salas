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
                <td>
                <button class="btn btn-block btn-success" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="cargarDiv('#detallemodal','tabla.php');">Editar</button>
                 <button class="btn btn-block btn-danger">Eliminar</button>
                </td>
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



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="detallemodal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>