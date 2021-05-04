<?php
  session_start();
  require_once "../../clases/Conexion.php";
  $conexion = new Conexion();
  $id_usuarios = $_SESSION['id_usuarios'];
  $conexion = $conexion->conectar();
  $sql = "SELECT
	              archivos.id_archivo AS idArchivo,
                usuario.nombre AS nombreUsuario,
                categorias.nombre AS categoria,
                archivos.nombre AS nombreArchivo,
                archivos.tipo AS tipoArchivo,
                archivos.ruta AS rutaArchivo,
                archivos.fecha AS fecha
          FROM
	            t_archivos AS archivos
	            	INNER JOIN
	            t_usuarios AS usuario ON archivos.id_usuarios = usuario.id_usuarios
	            	INNER JOIN
	            t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                AND archivos.id_usuarios = '$id_usuarios'";
  $exito = mysqli_query($conexion, $sql);
?>
<div class="row">
  <div class="col-sm-12">
    <div class="table-respomsive">
      <table class="table table-hover" id="tablaGestorDataTable">
        <thead class="thead-dark">
          <tr style="text-align: center;">
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Tipo de archivo</th>
            <th>Descargar</th>
            <th>Visualizar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($mostrar = mysqli_fetch_array($exito)){
              $rutaDescarga = "../archivos/" . $id_usuarios . "/" . $mostrar['nombreArchivo'];
              $nombreArchivo = $mostrar['nombreArchivo'];
              $id_archivo = $mostrar['idArchivo'];
          ?>
          <tr style="text-align: center;">
            <th><?php echo $mostrar['categoria'];?></th>
            <td><?php echo $mostrar['nombreArchivo'];?></td>
            <td><?php echo $mostrar['tipoArchivo'];?></td>
            <td>
              <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-outline-success btn-sm">
                <span class="fas fa-download"></span>
              </a>
            </td>
            <td></td>
            <td style="text-align: center;">
            <span type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarArchivo('<?php echo $id_archivo; ?>')">
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
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGestorDataTable').DataTable();
  });
</script>