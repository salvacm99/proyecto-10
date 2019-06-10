<?php
/**
 * Jugador
 */
class Usuario extends Conexion
{
  public $conexion=null;
  private $nombre;
  private $apellidos;
  private $edad;
  private $curso;

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
    if(!isset($post)||!isset($post["nombre"])||!isset($post["apellidos"])||!isset($post["edad"])||!isset($post["curso"])){
      $error="";
    }elseif($post["nombre"]==""){
      $error="No has introducido el nombre";
    }elseif($post["apellidos"]==""){
      $error="No has introducido el apellido";
    }elseif($post["edad"]==""){
      $error="No has introducido la edad";
    }elseif($post["curso"]==""){
      $error="No has introducido el curso";
    }else{
      $error=false;
      $this->nombre=$post["nombre"];
      $this->apellidos=$post["apellidos"];
      $this->edad=$post["edad"];
      $this->curso=$post["curso"];
    }
      return $error;
  }

  public function insertarJugador(){
      $consulta="INSERT INTO usuarios (nombre, apellidos, edad, curso)
      VALUES ('$this->nombre', '$this->apellidos', $this->edad, $this->curso)";
      $this->conexion->query($consulta);
  }
  public function listarJugadores(){
      $resultado=$this->conexion->query("SELECT id, nombre, apellidos, edad, curso, puntuacion FROM usuarios");
      return $resultado;
  }
  public function cogerJugador(){
      $usuario1=$_SESSION["usuario"];
      $resultado3 = $this->conexion->query("SELECT nombre FROM usuarios where id='$usuario1'");
      return $resultado3;
  }
  
  public function incrementarPunt(){
      $usuario1=$_SESSION["usuario"];
      $resultado2=$this->conexion->query("SELECT * FROM usuario_juego where id_usuario=$usuario1 && id_juego=1");
      $num_filas=$resultado2->num_rows;
      if ($num_filas==0) {
          $consulta="INSERT INTO usuario_juego (id_usuario, id_juego, puntuacion) VALUES ($usuario1, 1, 0)";
          $this->conexion->query($consulta);
      }

      else {
          $actualizar=$this->conexion->query("UPDATE usuario_juego SET puntuacion=puntuacion+5 where id_usuario=$usuario1");
      }
      return $resultado2;
    }

  }
