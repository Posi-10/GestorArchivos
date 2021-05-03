<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first mt-2">
        <img src="img/logo.png" style="width: 115px;" id="icon" alt="User Icon"/>
        <h1>Gestor de archivos</h1>
      </div>

      <!-- Login Form -->
      <form method="post" id="frmLogin" onsubmit="return logear()">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
        <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="Contraseña" required="">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="registro.php">Registrar</a>
      </div>

    </div>
  </div>
  <script src="librerias/jquery/jquery-3.6.0.min.js"></script>
  <script src="librerias/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">
    function logear(){
      $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(),
        url: "procesos/usuario/login/login.php",
        success: function(respuesta){
          respuesta = respuesta.trim();
          if(respuesta == 1){
            window.location = "vistas/inicio.php"
          }else{
            swal({
              title: "Error",
              icon: "error",
              text: "¡No te encontramos!",
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