<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'config/conexion.php');

  class Launch extends Conexion {

    public function __construct() {
      parent::__construct();
    }

    public function create($mision, $año_lanzamiento, $cohete, $lugar_lanzamiento) {
      $query = "INSERT INTO launches (mission_name,launch_year,rocket_name,launch_site)
                VALUES (:mission_name,:launch_year,:rocket_name,:launch_site)";

      $resultado = $this->conexionBD->prepare($query);
      $resultado->execute(array(":mission_name"=>$mision, ":launch_year"=>$año_lanzamiento,
                                ":rocket_name"=>$cohete, ":launch_site"=>$lugar_lanzamiento));
      
      return header("location: ../views/admin/home/home.php?succes=true");
    }

    public function read($numero_vuelo = ""){

      if($numero_vuelo != ""){
        $query = "SELECT * FROM launches WHERE flight_number = :flight_number";

        $resultado = $this->conexionBD->prepare($query);

        $resultado->execute(array(":flight_number"=>$numero_vuelo));

        return $resultado->fetch();
      }

      $query = "SELECT * FROM launches";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute();

      return $resultado->fetchAll();

    }

    public function update($numero_vuelo, $mision, $año_lanzamiento, $cohete, $lugar_lanzamiento){

      $query = "UPDATE launches SET mission_name = :mission_name, launch_year = :launch_year,
                rocket_name = :rocket_name, launch_site = :launch_site WHERE flight_number = :flight_number";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":mission_name"=>$mision, ":launch_year"=>$año_lanzamiento,
                                ":rocket_name"=>$cohete, ":launch_site"=>$lugar_lanzamiento,
                                ":flight_number" => $numero_vuelo));

      return header("location: ../views/admin/home/home.php?succes=true");

    }

    public function delete($numero_vuelo){

        $query = "DELETE FROM launches WHERE flight_number = :flight_number";

        $resultado = $this->conexionBD->prepare($query);

        $resultado->execute(array(":flight_number"=>$numero_vuelo));

        return header('location: ../views/admin/home/home.php?succes=true');

    }

  }
