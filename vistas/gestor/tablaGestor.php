<div class="row">
  <div class="col-sm-12">
    <div class="table-respomsive">
      <table class="table table-hover" id="tablaGestorDataTable">
        <thead class="thead-dark">
          <tr style="text-align: center;">
            <th>Nombre</th>
            <th>Tipo de archivo</th>
            <th>Descargar</th>
            <th>Visualizar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center;">
            <span type="button" class="btn btn-outline-danger">
              <span class="fas fa-trash"></span>
            </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGestorDataTable').DataTable();
  });
</script>