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
    <title>Registrar usuario | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="forms-styles.css">
  </head>
  <body>
    
    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Sesión iniciada: <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Registro de usuario</h1>
      <form class="forms" action="../../../controllers/UserControllers.php?action=create" method="post" autocomplete="off" role="form">
        <div class="form-group">
          <input class="input" type="text" name="fullname" placeholder="Nombre y apellido" required>
          <input class="input" type="email" name="email" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
          <input class="input" type="text" name="address" placeholder="Dirección de habitación" required>
          <input class="input" type="text" name="user" placeholder="Nombre de usuario" required>
        </div>
        <div class="form-group">
          <select class="input" name="role" class="form-control" required>
            <option value="2">Regular</option>
            <option value="1">Administrador</option>
          </select>
        </div>
        <div class="form-group">
          <input class="input" type="password" name="pass" placeholder="Contraseña" required>
          <input class="input" type="password" name="confirmPass" placeholder="Confirmación de contraseña" required>
        </div>
        <input class="btn" type="submit" name="submit" value="Guardar">
      </form>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>
      
  </body>
</html>
