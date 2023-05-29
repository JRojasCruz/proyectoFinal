<?php
require_once '../Models/Requisitos.php';

if (isset($_POST['operacion'])){
  $requisitos = new Requisitos();
  if($_POST['operacion']=='adjuntarRequisitos'){
    //Adjuntar certificado de estudios
      $rutaDestinoCE = ''; //Definido en la estructura del proyecto
      $nombreArchivoCE = ''; //Generar para evitar redundancia
      $nombreGuardarCE = 'NULL'; //Enviar a tabla en la BD
      //Paso 1: Subir el archivo (si existe)
      if(isset($_FILES['certestudios'])){
        //Ruta
        $rutaDestinoCE = '../Documents/';
        //Nombre archivo (host)
        $nombreArchivoCE = sha1(date('c')) . ".pdf";
        //Ruta completa (ruta + nombre)
        $rutaDestinoCE .= $nombreArchivoCE;
        if(move_uploaded_file($_FILES['certestudios']['tmp_name'], $rutaDestinoCE)){
          $nombreGuardarCE = $nombreArchivoCE;
        }
      }
      //Adjuntar FOTO
      $rutaDestinoFoto = ''; //Definido en la estructura del proyecto
      $nombreArchivoFoto = ''; //Generar para evitar redundancia
      $nombreGuardarFoto = 'NULL'; //Enviar a tabla en la BD
      //Paso 1: Subir el archivo (si existe)
      if(isset($_FILES['foto'])){
        //Ruta
        $rutaDestinoFoto = '../Documents/';
        //Nombre archivo (host)
        $nombreArchivoFoto = sha1(date('c')) . ".jpg";
        //Ruta completa (ruta + nombre)
        $rutaDestinoFoto .= $nombreArchivoFoto;
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestinoFoto)){
          $nombreGuardarFoto = $nombreArchivoFoto;
        }
      }
      //Adjuntar Antecedentes Policiales
      $rutaDestinoAP = ''; //Definido en la estructura del proyecto
      $nombreArchivoAP = ''; //Generar para evitar redundancia
      $nombreGuardarAP = 'NULL'; //Enviar a tabla en la BD
      //Paso 1: Subir el archivo (si existe)
      if(isset($_FILES['antpoliciales'])){
        //Ruta
        $rutaDestinoAP = '../Documents/';
        //Nombre archivo (host)
        $nombreArchivoAP = sha1(date('c')) . ".pdf";
        //Ruta completa (ruta + nombre)
        $rutaDestinoAP .= $nombreArchivoAP;
        if(move_uploaded_file($_FILES['antpoliciales']['tmp_name'], $rutaDestinoAP)){
          $nombreGuardarAP = $nombreArchivoAP;
        }
      }
    $adjuntarDatos = [
      "certEstudios"           => $nombreGuardarCE,
      "foto"                   => $nombreGuardarFoto,
      "certAntPoliciales"      => $nombreGuardarAP
    ];
    $respuesta = $requisitos->adjuntarRequisitos($adjuntarDatos);
    echo json_encode($respuesta);
  }
}