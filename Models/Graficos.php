<?php
require_once "Conexion.php";
class Grafico{
    private $access;
    public function __CONSTRUCT(){
      $conexion = new Conexion();
      $this->access = $conexion->getConexion();
    }
    public function graficarCarreras(){
      try{
        $consulta = $this->access->prepare("CALL spu_grafico_carreras()");
        $consulta->execute();
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function graficarPagos(){
      try{
        $consulta = $this->access->prepare("CALL spu_grafico_estadopagos()");
        $consulta->execute();
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
  }
  ?>