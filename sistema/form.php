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

?>

  <button type="button" class="btn btn-success" onclick="cargarDiv('#principal','salas.php');" > << Regresar </button>

 <form method="POST" id="formdata">
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


                         <script type="text/javascript">
                    function validaForm(){
    // Campos de texto
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus();  
    return false;
    }
    if($("#descripcion").val() == ""){
        alert("El campo descripcion  no puede estar vacío.");
        $("#descripcion").focus();
        return false;
    }
    if($("#fecha").val() == ""){
        alert("El campo Fecha  no puede estar vacío.");
        $("#fecha").focus();
        return false;
    }

if($("#horainicio").val() == ""){
        alert("El campo Hora Inicio  no puede estar vacío.");
        $("#horainicio").focus();
        return false;
    }

    if($("#horafin").val() == ""){
        alert("El campo Hora Fin  no puede estar vacío.");
        $("#horafin").focus();
        return false;
    }

    return true; // Si todo está correcto
}
</script>

 <script type="text/javascript">

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm()){                               // Primero validará el formulario.
            $.post("GuardaSala1.php",$("#formdata").serialize(),function(res){
                $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                if(res == 1){
                    $("#exito").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                     $("#formdata").delay(500).fadeOut("slow");   
                } else {
                    $("#fracaso").delay(500).fadeIn("slow");    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                }
            });
        }
    });    
});

 </script>
