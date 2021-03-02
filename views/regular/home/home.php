<?php
  session_start();

  if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
    header('location: ../../login/login.php');
  }else if($_SESSION['role'] != 'regular'){
    header('location: ../../../utils/logout.php');
  }

  require_once('../../../models/Launch.php');
  $consulta = new Launch();

  $lanzamientos = $consulta->read();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Bienvenido, <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Lanzamientos de SpaceX</h1>

      <table class="col-10">
        <thead>
          <tr>
            <th class="info">Nº Vuelo</th>
            <th class="info">Nombre de misión</th>
            <th class="info">Año de lanzamiento</th>
            <th class="info">Cohete</th>
            <th class="info">Lugar de lanzamiento</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($lanzamientos as $lanzamiento){
              echo '<tr>';
                echo '<td>'.$lanzamiento['flight_number'].'</td>';
                echo '<td>'.$lanzamiento['mission_name'].'</td>';
                echo '<td>'.$lanzamiento['launch_year'].'</td>';
                echo '<td>'.$lanzamiento['rocket_name'].'</td>';
                echo '<td>'.$lanzamiento['launch_site'].'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>

  </body>
</html>
