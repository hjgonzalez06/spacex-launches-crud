<header class="row">
  <figure id="logo" class="col-6">
    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/assets/logos/SpaceX-Logo.svg'); ?>
  </figure>
  <nav id="navbar" class="col-6">
    <ul id="navbar-list">
      <?php
        if (!isset($_SESSION['usuario']) || !isset($_SESSION['account_id'])) {
          echo '<li class="list-item"><a href="#">Crear cuenta</a></li>';
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] == "administrador") {
          echo '<li class="list-item"><a href="../../../views/admin/home/home.php">Inicio</a></li>';
          echo '<li class="list-item"><a href="../../../views/admin/users/users.php">Gestión de usuarios</a></li>';
          echo '<li class="list-item"><a href="../../../utils/logout.php">Salir</a></li>';
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] == "regular") {
          echo '<li class="list-item"><a href="../../../views/regular/home/home.php">Inicio</a></li>';
          echo '<li class="list-item"><a href="../../../views/regular/account/account.php">Mi cuenta</a></li>';
          echo '<li class="list-item"><a href="../../../utils/logout.php">Salir</a></li>';
        }
      ?>
    </ul>
  </nav>
</header>
