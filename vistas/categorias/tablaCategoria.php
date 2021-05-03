<?php
  session_start();
  $id_usuario = $_SESSION['id_usuarios'];
?>
<div class="table-responsive">
  <table class="table table-hover" id="tablaCategoriaDataTable">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Elimiar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td style="text-align: center;">
          <span class="btn btn-outline-info btn-sm">
            <span class="fas fa-edit"></span>
          </span>
        </td>
        <td style="text-align: center;">
          <span class="btn btn-outline-danger btn-sm">
            <span class="fas fa-trash"></span>
          </span>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaCategoriaDataTable').DataTable();
  });
</script>