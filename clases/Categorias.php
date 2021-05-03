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
  }
?>