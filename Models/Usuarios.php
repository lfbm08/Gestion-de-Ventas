<?php
  function consultarUsuarios() {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT usuario.id, usuario.rut, perfil.descripcion, usuario.nombre, usuario.apellido, usuario.correo, usuario.edad, usuario.sexo, usuario.estado FROM usuario INNER JOIN perfil ON perfil.idPerfil = usuario. idPerfil");
    return(mysqli_fetch_all($result));
  }
?>