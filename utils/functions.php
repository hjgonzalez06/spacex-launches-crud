<?php

  function limpiar($dato){
    return htmlentities(addslashes($dato));
  }

  function contraseñasIguales($pass,$confirmPass){
    return $pass == $confirmPass;
  }
