<?php

class FileHelper {

  public function uploadFile($name, $extension){
    $nombreArchivo = '';
    $rutaDestino = '';
    $nombreGuardar = null;
    if(isset($_FILES[$name])){
      $rutaDestino = '../Documents/';
      $nombreArchivo = sha1(date('c')) . $extension;
      $rutaDestino .= $nombreArchivo;
  
      if(move_uploaded_file($_FILES[$name]["tmp_name"], $rutaDestino)){
        $nombreGuardar = $nombreArchivo;
      }

      return  $nombreGuardar;
    }

    return "";
  }
}