<?php
  session_start();

  if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
    header('location: ../../login/login.php');
  }else if($_SESSION['role'] != 'administrador'){
    header('location: ../../../utils/logout.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar lanzamiento | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="forms-styles.css">
  </head>
  <body>

    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Usuario: <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Registro de lanzamiento</h1>
      <form class="forms" action="../../../controllers/LaunchControllers.php?action=create" method="POST" autocomplete="off" role="form">
        <div class="form-group">
          <input class="input" type="text" name="mission_name" placeholder="Nombre de la misión" autofocus required>
          <input class="input" type="text" name="launch_year" placeholder="Año de lanzamiento" required>
        </div>
        <div class="form-group">
          <input class="input" type="text" name="rocket_name" placeholder="Nombre del cohete" required>
          <input class="input" type="text" name="launch_site" placeholder="Lugar de lanzamiento" required>
        </div>
        <input class="btn" type="submit" name="submit" value="Guardar">
      </form>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>
      
  </body>
</html>
