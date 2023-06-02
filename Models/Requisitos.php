<?php
require_once "Conexion.php";
class Requisitos{
  private $access;
  public function __CONSTRUCT(){
    $conexion = new Conexion();
    $this->access = $conexion->getConexion();
  }
  public function adjuntarRequisitos($datos = []){
    try {
        // Ejecutar el procedimiento almacenado
        $consulta = $this->access->prepare("CALL spu_adjuntar_requisitos(?,?,?,?)");
        $consulta->execute(array(
            $datos["idMatricula"],
            $datos["certEstudios"],
            $datos["foto"],
            $datos["certAntPoliciales"]
        ));
        return true;
    } catch (Exception $e) {
        // Manejar el error según criterio...
        return false;
    }
}

}
?>