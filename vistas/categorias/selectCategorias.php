<?php
  session_start();
  require_once "../../clases/Conexion.php";
  $Conexion = new Conexion();
  $Conexion = $Conexion->conectar();
  $id_usuarios = $_SESSION['id_usuarios'];
  $sql = "SELECT id_categoria,
                 nombre
          FROM t_categorias
          WHERE id_usuarios = '$id_usuarios'";
  $result = mysqli_query($Conexion, $sql);

?>
<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
  <option selected>Seleccionar</option>
  <?php
    while($mostrar = mysqli_fetch_array($result)){
      $id_categoria = $mostrar['id_categoria'];
  ?>
  <option value="<?php echo $id_categoria;?>"><?php echo $mostrar['nombre'];?></option>
  <?php
    }
  ?>
</select>