<?php
/**
 * Jugador
 */
class Juego extends Conexion
{
  public $conexion=null;
  private $id;
  private $nombre;

  function __construct()
  {
  }

  /*
  * Param entrada: array $_POST
  * Param salida: string con el $error
  *               - ""-> sin error
                  - "MSG"-> error encontrado
  */
  public function comprobarCampos($post){
    $error=null;
    if(!isset($post)||!isset($post["id"])||!isset($post["nombre"])){
      $error="";
    }elseif($post["id"]==""){
      $error="No has introducido el nombre";
    }elseif($post["nombre"]==""){
      $error="No has introducido el apellido";
    }else{
      $error=false;
      $this->nombre=$post["id"];
      $this->apellidos=$post["nombre"];
    }
    return $error;
  }

  public function listarJugadores(){
    $resultado=$this->conexion->query("SELECT id, nombre FROM usuarios");
    return $resultado;
  }
  }

 ?>
