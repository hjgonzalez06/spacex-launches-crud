<?php
  session_start();

  if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
    header('location: ../../login/login.php');
  }else if($_SESSION['role'] != 'regular'){
    header('location: ../../../utils/logout.php');
  }

  require_once('../../../models/User.php');
  $consulta = new User();

  $usuario = $consulta->read($_SESSION['account_id']);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta | SpaceX</title>
    <link rel="icon" href="../../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <?php include_once('../../../components/navbar/navbar.php'); ?>

    <h3 id="welcome" class="row col-12">
      <span>&gt;</span> Usuario(a): <span><?php echo $_SESSION['usuario']; ?></span>
    </h3>

    <main>
      <h1 id="main-title" class="col-6">Información de la cuenta</h1>
      <form class="forms" action="../../../controllers/UserControllers.php?action=updateRegular" method="POST" autocomplete="off" role="form">
        <input type="text" name="id" value="<?php echo $usuario['account_id'] ?>" hidden>
        <div class="form-group">
          <input class="input" type="text" name="fullname" value="<?php echo $usuario['fullname'] ?>" required>
          <input class="input" type="email" name="email" value="<?php echo $usuario['email'] ?>" required>
        </div>
        <div class="form-group">
          <input class="input" type="text" name="address" value="<?php echo $usuario['address'] ?>" required>
        </div>
        <input class="btn" type="submit" name="submit" value="Actualizar">
      </form>
    </main>

    <?php echo include_once('../../../components/footer/footer.php'); ?>

  </body>
</html>
