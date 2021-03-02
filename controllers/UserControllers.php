<?php

  require_once('../models/User.php');
  require_once('../utils/functions.php');

  switch ($_GET['action']){
    case "create":
      if(isset($_POST['user']) && isset($_POST['fullname']) && isset($_POST['email'])
        && isset($_POST['address']) && isset($_POST['pass']) && isset($_POST['confirmPass'])
          && isset($_POST['role'])){

        if($_POST['user']!="" && $_POST['fullname']!="" && $_POST['email']!="" &&
          $_POST['address']!="" && $_POST['pass']!="" && $_POST['confirmPass']!=""
            && $_POST['role']!=""){

          $usuario = limpiar($_POST['user']);
          $contraseña = limpiar($_POST['pass']);
          $contraseña2 = limpiar($_POST['confirmPass']);
          $nombre = limpiar($_POST['fullname']);
          $correo = limpiar($_POST['email']);
          $direccion = limpiar($_POST['address']);
          $rol = limpiar($_POST['role']);

          if(contraseñasIguales($contraseña,$contraseña2)){
            $user = new User();

            $contraseña = password_hash($contraseña,PASSWORD_DEFAULT);
            $user->create($usuario,$contraseña,$nombre,$correo,$direccion,$rol);
          }else{
            header('location: ../views/admin/forms/createUser.php?iguales=false');
          }
        }else{
          header('location: ../views/admin/forms/createUser.php?incomplete=true');
        }
      }else{
        header('location: ../views/admin/forms/createUser.php?unset=true');
      }
    case "update":
      if(isset($_POST['id']) && isset($_POST['user']) && isset($_POST['fullname']) && isset($_POST['email'])
        && isset($_POST['address']) && isset($_POST['role'])){

        if($_POST['id']!="" && $_POST['user']!="" && $_POST['fullname']!="" && $_POST['email']!=""
          && $_POST['address']!="" && $_POST['role']!=""){
            
          $id = limpiar($_POST['id']);
          $usuario = limpiar($_POST['user']);
          $nombre = limpiar($_POST['fullname']);
          $correo = limpiar($_POST['email']);
          $direccion = limpiar($_POST['address']);
          $rol = limpiar($_POST['role']);

          $user = new User();

          $user->update($id,$usuario,$nombre,$correo,$direccion,$rol);

        }else{
          header('location: ../views/admin/forms/updateUser.php?id='.$_POST['id'].'&incomplete=true');
        }
      }else{
        header('location: ../views/admin/forms/updateUser.php?id='.$_POST['id'].'&unset=true');
      }
    case "delete":
      if(isset($_GET['id'])){

        if($_GET['id'] != ""){
          $id = limpiar($_GET['id']);
          $user = new User();
          $user->delete($id);
        }else{
          header('location: ../views/admin/users/users.php?incomplete=true');
        }
      }else{
        header('location: ../views/admin/users/users.php?unset=true');
      }
      case "updateRegular":
        if(isset($_POST['id']) && isset($_POST['fullname']) && isset($_POST['email'])
          && isset($_POST['address'])){
  
          if($_POST['id']!="" && $_POST['fullname']!="" && $_POST['email']!=""
            && $_POST['address']!=""){
              
            $id = limpiar($_POST['id']);
            $nombre = limpiar($_POST['fullname']);
            $correo = limpiar($_POST['email']);
            $direccion = limpiar($_POST['address']);
  
            $user = new User();
  
            $user->updateRegular($id,$nombre,$correo,$direccion);
  
          }else{
            header('location: ../views/regular/account/account.php?id='.$_POST['id'].'&incomplete=true');
          }
        }else{
          header('location: ../views/regular/account/account.php?id='.$_POST['id'].'&unset=true');
        }  
  }
