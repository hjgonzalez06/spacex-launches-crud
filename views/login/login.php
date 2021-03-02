<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión | SpaceX</title>
    <link rel="icon" href="../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php echo include_once('../../components/navbar/navbar.php'); ?>

    <main class="row">
        <form id="login" class="col-3" action="../../controllers/AuthControllers.php" method="post" autocomplet="off">
            <input id="user" class="input" type="text" name="usuario" placeholder="Usuario" autofocus="" required=""></p>
            <input id="pass" class="input" type="password" name="pass" placeholder="Contraseña" required=""></p>
            <input type="submit" id="submit" name="submit" value="Ingresar" class="boton">
        </form>
    </main>

    <?php echo include_once('../../components/footer/footer.php'); ?>

</body>
</html>
