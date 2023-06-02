<?php
require_once "Conexion.php";
class Reportes{
    private $access;
    public function __CONSTRUCT(){
      $conexion = new Conexion();
      $this->access = $conexion->getConexion();
    }
    public function listarMatriculadosPorCarrera($carrera){
      try{
        $consulta = $this->access->prepare("CALL spu_listar_matriculas_por_carrera(?)");
        $consulta->execute(array($carrera));
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
  }
  ?>