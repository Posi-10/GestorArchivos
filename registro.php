<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="librerias/jquery-ui/jquery-ui.theme.css">
  <link rel="stylesheet" href="librerias/jquery-ui/jquery-ui.css">
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;" class="mt-2">Registro de usuario</h1>
    <hr>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
          <label for="">Nombre de persona</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required="">
          <label for="">Fecha de nacimiento</label>
          <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
          <label for="">Email o correo</label>
          <input type="email" name="email" id="email" class="form-control" required="">
          <label for="">Nombre de usuario</label>
          <input type="text" name="usuario" id="usuario" class="form-control" required="">
          <label for="">Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control" required="">
          <br>
          <div class="row">
            <div class="col-sm-6 text-left">
              <button class="btn btn-primary">Registar</button>
            </div>
            <div class="col-sm-6 text-right">
              <a href="index.php" class="btn btn-success">Login</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
  <script src="librerias/jquery/jquery-3.6.0.min.js"></script>
  <script src="librerias/jquery-ui/jquery-ui.js"></script>
  <script src="librerias/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">
    let fecha = new Date();
    let year = fecha.getFullYear;
    $(function(){
      $('#fechaNacimiento').datepicker({
        showAnim: "slideDown",
        yearRange: "1900:" + year,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
      });
    });
    function agregarUsuarioNuevo(){
      $.ajax({
        method: "POST",
        data: $('#frmRegistro').serialize(),
        url: "procesos/usuario/registro/agregarUsuario.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if(respuesta == 1){
            $('#frmRegistro')[0].reset();
            swal({
              title: "Correcto",
              icon: "success",
              text: "¡Agregado con exito!",
              button: false,
              timer: 2000,
            });
          }else if(respuesta == 2){
            swal({
              title: "Advertencia",
              icon: "warning",
              text: "¡Este usuario ya existe!\nFavor de ingresar otro",
              button: false,
              timer: 2000,
            });
          }else if(respuesta == 3){
            swal({
              title: "Advertencia",
              icon: "warning",
              text: "¡Este correo electronico ya existe!\nFavor de ingresar otro",
              button: false,
              timer: 2000,
            });
          }else{
            swal({
              title: "Error",
              icon: "error",
              text: "¡Fallo al agregar!",
              button: false,
              timer: 2000,
            });
          }
        }
      });
      return false;
    }
  </script>
</body>
</html>