<?php
  session_start();

  if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
    header('location: ../../login/login.php');
  }else if($_SESSION['role'] != 'administrador'){
    header('location: ../../../utils/logout.php');
  }

  require_once('../../../models/Launch.php');
  $consulta = new Launch();

  $lanzamiento = $consulta->readById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar lanzamiento | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="forms-styles.css">
  </head>
  <body>

    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Sesión iniciada: <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Actualización de lanzamiento</h1>
      <form class="forms" action="../../../controllers/LaunchControllers.php?action=update" method="POST" autocomplete="off" role="form">
        <input type="text" name="flight_number" value="<?php echo $lanzamiento['flight_number'] ?>" hidden>
        <div class="form-group">
          <input class="input" type="text" name="mission_name" value="<?php echo $lanzamiento['mission_name'] ?>">
          <input class="input" type="text" name="launch_year" value="<?php echo $lanzamiento['launch_year'] ?>">
        </div>
        <div class="form-group">
          <input class="input" type="text" name="rocket_name" value="<?php echo $lanzamiento['rocket_name'] ?>">
          <input class="input" type="text" name="launch_site" value="<?php echo $lanzamiento['launch_site'] ?>">
        </div>
        <input class="btn" type="submit" name="submit" value="Actualizar">
      </form>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>
      
  </body>
</html>
