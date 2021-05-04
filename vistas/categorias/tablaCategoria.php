<?php
  session_start();
  require_once "../../clases/Conexion.php";
  $id_usuarios = $_SESSION['id_usuarios'];
  $conexion = new Conexion();
  $conexion = $conexion->conectar();
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
      <?php
        $sql = "SELECT id_categoria,
                       nombre,
                       fechaInsert
                FROM t_categorias
                WHERE id_usuarios = '$id_usuarios'";
        $result = mysqli_query($conexion, $sql);
        while($mostrar = mysqli_fetch_array($result)){
          $id_categoria = $mostrar['id_categoria'];
      ?>
      <tr style="text-align: center;">
        <td><?php echo $mostrar['nombre'];?></td>
        <td><?php echo $mostrar['fechaInsert'];?></td>
        <td>
          <span class="btn btn-outline-info btn-sm" onclick="obtenerDatosCategoria('<?php echo $id_categoria;?>')" data-toggle="modal" data-target="#modalActualizarCategoria">
            <span class="fas fa-edit"></span>
          </span>
        </td>
        <td>
          <span class="btn btn-outline-danger btn-sm" onclick="eliminarCategoria('<?php echo $id_categoria;?>')">
            <span class="fas fa-trash"></span>
          </span>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaCategoriaDataTable').DataTable();
  });
</script>