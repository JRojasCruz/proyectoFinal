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
    public function listarCarreras(){
      try{
        $consulta = $this->access->prepare("SELECT * FROM Carrera");
        $consulta->execute();
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function listarMetodoPago(){
      try{
        $consulta = $this->access->prepare("SELECT * FROM MetodoPago");
        $consulta->execute();
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function registrarMatricula($datos = []){
      try{
        $consulta = $this->access->prepare("CALL spu_registrar_matricula(?,?,?,?,?,?,?,?)");
        $consulta->execute(
          array(
            $datos["nombres"],
            $datos["apellidos"],
            $datos["tipoDocumento"],
            $datos["nroDocumento"],
            $datos["nroCelular"],
            $datos["email"],
            $datos["idCarrera"],
            $datos["idMetodoPago"]
          )
        );
        return true;
      }
      catch(Exception $e){
        //Manejar el error según criterio...
        return false;
      }
    }

  }
  ?>