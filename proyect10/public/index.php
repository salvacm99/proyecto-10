<?php
session_start();
require "./../src/conexion.php";
require "./../src/Jugador.php";
  $j=new Usuario();
  //$j->setServerName("www.myserver.com");
  $j->conectar();
          $puntuacion=$j->incrementarPunt();
      $lista=$j->cogerJugador();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet" href="css/estilos.css">
    <title></title>

  </head>
  <body>

    <?php
    if(isset($error)){
        if($error!="") echo "<h4>ERROR:$error</h4>";
    }
    ?>
    <?php if(!isset($_SESSION["usuario"])){
          header('Location: login.php');}?>
            <?php include "./assets/navSup.php"; ?>
    <div>
    <?php
    foreach ($lista as $usuario) {
      echo "Usuario en línea: "."<span style=color:green;font-size:25px;>".$usuario['nombre']."</span>"."<br>";
    }
    foreach ($puntuacion as $usuario1) {
      echo "Puntuación: "."<span style=color:green;font-size:25px;>".$usuario1['puntuacion']."</span>"."<br>";
    }

  ?>
<br>
    <script type="text/javascript" src="js/codigo.js"></script>
    <p id="comprobacion"></p>


<?php include "./assets/footer.php"; ?>
  </body>
</html>
