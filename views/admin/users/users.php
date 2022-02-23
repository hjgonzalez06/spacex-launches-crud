<?php
  session_start();

  if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
    header('location: ../../login/login.php');
  }else if($_SESSION['role'] != 'administrador'){
    header('location: ../../../utils/logout.php');
  }

  require_once('../../../models/User.php');
  $consulta = new User();

  $usuarios = $consulta->readAll();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios  | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Bienvenido, <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Gestión integral de usuarios</h1>

      <div id="options" class="row col-12">
        <button id="new-user">
          <a href="../forms/createUser.php">Nuevo usuario</a>
        </button>
      </div>

      <table class="col-10">
        <thead>
          <tr>
            <th class="info">Id usuario</th>
            <th class="info">Nombre y apellido</th>
            <th class="info">Usuario</th>
            <th class="info">Correo electrónico</th>
            <th class="info">Dirección</th>
            <th class="info">Nivel</th>
            <th class="info" colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($usuarios as $usuario){
              if($usuario['account_id'] != $_SESSION['account_id']){
                echo '<tr>';
                  echo "<td>".$usuario['account_id']."</td>";
                  echo "<td>".$usuario['fullname']."</td>";
                  echo "<td>".$usuario['username']."</td>";
                  echo "<td>".$usuario['email']."</td>";
                  echo "<td>".$usuario['address']."</td>";
                  echo "<td>".$usuario['role']."</td>";
                  echo '<td class="warning"><a href="../forms/updateUser.php?id='
                        .$usuario['account_id'].'">Actualizar</a></td>';
                  echo '<td class="danger"><a href="../../../controllers/UserControllers.php?'
                        .'action=delete&id='.$usuario['account_id'].'">Eliminar</a></td>';
                echo '</tr>';
              }
            }
          ?>
        </tbody>
      </table>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>

  </body>
</html>
