<?php
  //iniciamos la sesion
    session_start();
  // conexion
require "./../src/conexion.php";
require "./../src/Jugador.php";
  $j=new Usuario();
  //$j->setServerName("www.myserver.com");
  $j->conectar();
  $error=$j->comprobarCampos($_POST);
  if(isset($error)){
      if($error===false){
        //NO HAY ERROR
        $j->conectar();
        $j->insertarJugador();
      }
  }
  $lista=$j->listarJugadores();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!--Mensaje en caso de querer volver al login y ya estar iniciado -->
  <?php if(isset($_SESSION["usuario"])):?>
    <p id="mensaje">Ya estas iniciado en el sistema, es necesario cerrar la sesión antes de acceder como un usuario diferente.<p>
    <button type="button" name="button" value="cancelar" id="botoncancelar" onclick="window.location.href='index.php'">Cancelar</button>
    <button type="button" name="button" value="cancelar" id="botoncerrar" onclick="window.location.href='logout.php'">Cerrar sesión</button>
  <?php endif; ?>
    <!--En caso de no estar iniciado nos mostrara el login-->
  <?php if (!isset($_SESSION["usuario"])): ?>
    <?php include "./assets/navSup.php"; ?>
    <?php include "./assets/navSup.php"; ?>

    <div id="back">
      <canvas id="canvas" class="canvas-back"></canvas>
      <div class="backRight"></div>
      <div class="backLeft"></div>
    </div>

    <div id="slideBox">
      <div class="topLayer">
        <div class="left">
          <img src="img/titulo.png" alt=""></img>
            <div class="content">
              <h2>Registrarse</h2>
                <div class="form">
                  <div class="nombre-login">
                      <!--Formulario de registro-->
                      <form id="form-signup" action="login1.php" method="post">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="" id="nombre">
                        <div id="oculto" style='display:none;'>Debes rellenar este campo</div>
                  </div>
                    <br>
                  <div class="apellido-login">
                      <label for="apellidos" >Apellidos:</label>
                      <input type="text" name="apellidos" value="" id="apellidos">
                      <div id="oculto1" style='display:none;'>Debes rellenar este campo</div>
                  </div>
                    <br>
                  <div class="edad-login">
                      <label for="edad">Edad:</label>
                      <input type="text" name="edad" value="" id="edad">
                      <div id="oculto2" style='display:none;'>Debes rellenar este campo</div>
                      <div id="oculto3" style='display:none;'>Tiene que ser un número</div>
                    <br>
                  </div>
                  <div class="curso-login">
                      <label for="Curso">Curso:</label>
                      <input type="text" name="curso" value="" id="curso">
                      <div id="oculto4" style='display:none;'>Debes rellenar este campo</div>
                      <div id="oculto5" style='display:none;'>Tiene que ser un número</div>
                    <br>
                  </div>
                </div>
              <div class="form-element form-submit">
                      <button id="signUp" class="signup" type="submit" name="signup" onclick="return comprobar();">Registrarse</button>
                      </form>

                      <button id="goLeft" class="signup off">Acceder</button>
              </div>
            </div>
          </div>
        <div class="right">
            <img id="Titulo-login" src="img/titulo.png"></img>
            <div class="content">
              <h2>Iniciar sesión</h2>
                <!--Inicio de usuario-->
              <form id="form-login" action="login.php" method="post">
                <br>
                <br>
                <br>
                <br>
                  <div class="caja">
                    <select name="usuario">
                        <?php
                          foreach ($lista as $usuario1) {
                            echo "<option value=$usuario1[id]>".$usuario1['nombre']."</option>";}
                            $_SESSION["usuario"] = $_POST['usuario'];
                         ?>
                    </select>
                  </div>
                <button id="logIn" class="login" type="submit" name="login">Acceder</button>
              </form>
              <?php if(isset($_SESSION["usuario"])){
                $puntuacion=$j->incrementarPunt();
                $lista=$j->cogerJugador();
                header('Location: index.php');}?>
              <button id="goRight" class="login off" name="signup">Registrarse</button>
            </div>
          </div>
        </div>
      </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js"></script>
<script type="text/javascript" src="js/comprobar.js"></script>
<script type="text/javascript" src="js/login.js"></script>
  <?php endif; ?>
  </body>
</html>
