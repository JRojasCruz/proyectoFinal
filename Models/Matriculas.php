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
        $consulta = $this->access->prepare("CALL spu_registrar_matricula(?,?,?,?,?,?,?,?, @p_result)");
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
    
        // Obtener el valor de salida p_result
        $resultado = $this->access->query("SELECT @p_result")->fetch(PDO::FETCH_COLUMN);
    
        if ($resultado == 0) {
          // La matrícula se registró correctamente
          return true;
        } elseif ($resultado == 1) {
          // La persona ha alcanzado el límite de carreras permitidas
          return -1;
        } else {
          // Otro tipo de error ocurrió
          return false;
        }
      }
      catch(Exception $e){
        // Manejar el error según criterio...
        return false;
      }
    }
    
    public function buscarPostulante($numDocumento){
      try{
        $consulta = $this->access->prepare("CALL spu_buscar_postulante(?)");
        $consulta->execute(array(($numDocumento)));
        return $consulta->fetch(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function eliminarMatricula($idMatricula){
      try{
        $consulta = $this->access->prepare("CALL spu_eliminar_matricula(?)");
        $consulta->execute(array(($idMatricula)));
        return $consulta->fetch(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function procesarPagos($numDocumento){
      try{
        $consulta = $this->access->prepare("CALL spu_procesar_pago(?)");
        $consulta->execute(array(($numDocumento)));
        return $consulta->fetchall(PDO::FETCH_ASSOC);
      }catch(Exception $e){
        die($e->getMessage());
      }
    }

  }
  ?>