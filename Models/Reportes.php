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
    public function listarPorMetodoPago($carrera, $metodopago){
      try{
        $consulta = $this->access->prepare("CALL spu_obtener_pagos_carrera_metodo(?,?)");
        $consulta->execute(array($carrera,$metodopago));
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
  }
  ?>