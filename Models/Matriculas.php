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
            $datos["metodoPago"]
          )
        );
    
        // Obtener el valor de salida p_result
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    
        if ($resultado['p_result'] <= 1) {
          // La matrícula se registró correctamente
          return 0;
        } elseif ($resultado['p_result'] == 2) {
          // La persona ha alcanzado el límite de carreras permitidas
          return 1;
        } else {
          // Otro tipo de error ocurrió
          return -1;
        }
      }
      catch(Exception $e){
        // Manejar el error según criterio...
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