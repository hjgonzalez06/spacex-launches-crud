<?php

require_once('../models/Launch.php');
require_once('../utils/functions.php');

switch ($_GET['action']){
  case "create":
    if(isset($_POST["mission_name"]) && isset($_POST["launch_year"]) && isset($_POST["rocket_name"])
      && isset($_POST["launch_site"])) {

      if($_POST["mission_name"] != "" && $_POST["launch_year"] != "" && $_POST["rocket_name"] != ""
        && $_POST["launch_site"] != "") {

        $mision = limpiar($_POST["mission_name"]);
        $año_lanzamiento = limpiar($_POST["launch_year"]);
        $cohete = limpiar($_POST["rocket_name"]);
        $lugar_lanzamiento = limpiar($_POST["launch_site"]);

        $launch = new Launch();

        $launch->create($mision, $año_lanzamiento, $cohete, $lugar_lanzamiento);
      } else {
        header('location: ../views/admin/forms/createLaunch.php?incomplete=true');
      }
    } else {
      header("location: ../views/admin/forms/createLaunch.php?unset=true");
    }
  case "update":
    if(isset($_POST["flight_number"]) && isset($_POST["mission_name"]) && isset($_POST["launch_year"])
      && isset($_POST["rocket_name"]) && isset($_POST["launch_site"])) {

      if($_POST["flight_number"] != "" && $_POST["mission_name"] != "" && $_POST["launch_year"] != ""
        && $_POST["rocket_name"] != "" && $_POST["launch_site"] != "") {

        $numero_vuelo = limpiar($_POST["flight_number"]);
        $mision = limpiar($_POST["mission_name"]);
        $año_lanzamiento = limpiar($_POST["launch_year"]);
        $cohete = limpiar($_POST["rocket_name"]);
        $lugar_lanzamiento = limpiar($_POST["launch_site"]);

        $launch = new Launch();

        $launch->update($numero_vuelo, $mision, $año_lanzamiento, $cohete, $lugar_lanzamiento);
      } else {
        header('location: ../views/admin/forms/updateLaunch.php?incomplete=true');
      }
    } else {
      header('location: ../views/admin/forms/updateLaunch.php?unset=true');
    }
  case "delete":
    if(isset($_GET['id'])){

      if($_GET['id'] != ""){
        $numero_vuelo = limpiar($_GET['id']);
        $launch = new Launch();
        $launch->delete($numero_vuelo);
      } else {
        header("location: ../views/admin/home/home.php?incomplete=true");
      }
    } else {
      header("location: ../views/admin/home/home.php?unset=true");
    }
}
