<?php 
  session_start();
  if(isset($_SESSION['usuario'])){
    
  include "header.php";
?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Gestor de Archivos</h1>
      <span class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
        <span class="fas fa-plus-circle"></span> Agrega archivos
      </span>
      <hr>
      <div id="tablaGestorArchivos"></div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmArchivos" enctype="multipart/form-data" method="post">
            <label>Categoria</label>
            <div id="categiriasLoad"></div>
            <input type="file" name="archivos" id="archivos" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
<?php include "footer.php";?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
  });
</script>
<?php
  }else{
    header("location:../index.php");
  }
?>