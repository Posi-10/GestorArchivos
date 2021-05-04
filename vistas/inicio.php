<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    include "header.php";
?>
  <div class="container">
    <div class="row justify-content-md-center" style="text-align: center;">
      <div class="col-sm-5 mt-5" style="background-color: #E9ECEF;">
        <div class="card mb-2">
          <img class="card-img-top" src="../img/logo.png" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Gestor de Archivos</h1>
            <p class="card-text">Un trabajo elaborado por <a href="https://www.youtube.com/c/FacultadAutodidacta">Facultad Autodidacta</a></p>
            <p class="card-text">Con la forma de trabajo de <span style="color: #A730BE;">Posi</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
    include "footer.php";
  }
?>