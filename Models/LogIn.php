<?php
require_once "Conexion.php";
class User{
  private $access;
  public function __CONSTRUCT(){
    $conexion = new Conexion();
    $this->access = $conexion->getConexion();
  }
  public function logIn($userName=""){
    try{
      $consulta = $this->access->prepare("CALL spu_user_login(?)");
      $consulta->execute(array($usernName));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>