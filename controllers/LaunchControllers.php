<?php

  require_once('../models/Launch.php');
  require_once('../utils/functions.php');

  if ($_GET['action'] == 'create') {
    if (isset($_POST['mission_name']) && isset($_POST['launch_year']) && isset($_POST['rocket_name']) && isset($_POST['launch_site'])) {
      if ($_POST['mission_name'] != '' && $_POST['launch_year'] != '' && $_POST['rocket_name'] != '' && $_POST['launch_site'] != '') {

        $mision = limpiar($_POST['mission_name']);
        $año_lanzamiento = limpiar($_POST['launch_year']);
        $cohete = limpiar($_POST['rocket_name']);
        $lugar_lanzamiento = limpiar($_POST['launch_site']);

        $launch = new Launch();

        $launch->create($mision, $año_lanzamiento, $cohete, $lugar_lanzamiento);

        die();

      } else {
        header('location: ../views/admin/forms/createLaunch.php');
      }
    } else {
      header('location: ../views/admin/forms/createLaunch.php');
    }
  }

  if ($_GET['action'] == 'update') {
    if (isset($_POST['mission_name']) && isset($_POST['launch_year']) && isset($_POST['rocket_name']) && isset($_POST['launch_site']) && isset($_POST['flight_number'])) {
      if ($_POST['mission_name'] != '' && $_POST['launch_year'] != '' && $_POST['rocket_name'] != '' && $_POST['launch_site'] != '' && $_POST['flight_number'] != '') {

        $mision = limpiar($_POST['mission_name']);
        $año_lanzamiento = limpiar($_POST['launch_year']);
        $cohete = limpiar($_POST['rocket_name']);
        $lugar_lanzamiento = limpiar($_POST['launch_site']);
        $numero_vuelo = limpiar($_POST['flight_number']);

        $launch = new Launch();

        $launch->update($numero_vuelo, $mision, $año_lanzamiento, $cohete, $lugar_lanzamiento);

        die();

      } else {
        header('location: ../views/admin/forms/updateLaunch.php');
      }
    } else {
      header('location: ../views/admin/forms/updateLaunch.php');
    }
  }

  if ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
      if($_GET['id'] != '') {

        $numero_vuelo = limpiar($_GET['id']);

        $launch = new Launch();

        $launch->delete($numero_vuelo);

        die();

      } else {
        header('location: ../views/admin/home/home.php');
      }
    } else {
      header('location: ../views/admin/home/home.php');
    }
  }
