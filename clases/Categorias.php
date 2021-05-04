<?php
  require_once "Conexion.php";
  class Categorias extends Conexion{
    public function agrgarCategoria($datos){
      $conexion = Conexion::conectar();
      $sql = "INSERT INTO t_categorias(id_usuarios,
                                       nombre)
                     VALUES(?, ?)";
      $query = $conexion->prepare($sql);
      $query->bind_param("is", $datos['id_usuarios'],
                                $datos['categoria']
                        );
      $exito = $query->execute();
      $query->close();
      return $exito;
    }
    public function eliminarCategoria($id_categoria){
      $conexion = Conexion::conectar();
      $sql = "DELETE FROM t_categorias
              WHERE id_categoria = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param('i', $id_categoria);
      $exito = $query->execute();
      $query->close();
      return $exito;

    }
    public function obtenerDatosCategoria($id_categoria){
      $conexion = Conexion::conectar();
      $sql = "SELECT id_categoria,
                     nombre
              FROM t_categorias
              WHERE id_categoria = '$id_categoria'";
      $result = mysqli_query($conexion, $sql);
      $categoria = mysqli_fetch_array($result);
      $datos = array(
        "id_categoria" => $categoria['id_categoria'],
        "nombreCategoria" => $categoria['nombre']
      );
      return $datos;
    }
    public function actualizaCategoria($datos){
      $conexion = Conexion::conectar();
      $sql = "UPDATE t_categorias
              SET nombre = ?
              WHERE id_categoria = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param("si", $datos['categoria'],
                               $datos['id_categoria']);
      $respuesta = $query->execute();
      $query->close();
      return $respuesta;

    }
  }
?>