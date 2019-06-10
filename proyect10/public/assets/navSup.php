<nav>
    <ul>
      <?php if(!isset($_SESSION["usuario"])):?>

    <?php else:?>
      <li><a class="active" href="index.php">Inicio</a></li>
      <li><a class="active" href="listadoUsuarios.php">Jugadores</a></li>
      <li><a class="active" href="logout.php">Logout</a></li>
    <?php endif;?>
    </ul>
</nav>
