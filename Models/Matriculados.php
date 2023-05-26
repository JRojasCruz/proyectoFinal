<?php
require_once "Conexion.php";
class Matriculados{
    private $access;
    public function __CONSTRUCT(){
      $conexion = new Conexion();
      $this->access = $conexion->getConexion();
    }
    public function listarMatriculados(){
      try{
        $consulta = $this->access->prepare("CALL spu_listar_matriculados()");
        $consulta->execute();
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
  }
  ?>