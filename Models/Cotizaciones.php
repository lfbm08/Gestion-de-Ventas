<?php
  function consultarCotizaciones() {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT cotizacion.idCotizacion, cliente.rut, cotizacion.subtotal, cotizacion.descuento, cotizacion.total FROM cotizacion INNER JOIN cliente ON cotizacion.idCliente = cliente.id");
    return(mysqli_fetch_all($result));
  }

  function consultarCotizacion($sId) {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT idCotizacion, descuento, subtotal, total, fechaModificacion, estado, credito, montoCredito FROM cotizacion WHERE idCotizacion = ". $sId);
    return(mysqli_fetch_all($result));
  }

  function consultarCliente($sId) {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT cliente.rut, cliente.nombre, cliente.telefono, cliente.email, cliente.edad, cliente.sexo, cliente.region FROM cliente INNER JOIN cotizacion ON cotizacion.idCliente = cliente.id WHERE cotizacion.idCotizacion = ". $sId);
    return(mysqli_fetch_all($result));
  }

  function consultarProducto($sId) {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT producto.idProducto, tipo_producto.descripcion, producto.descripcion, producto.valorLista, producto.orientacion, producto.piso, producto.superficie, producto.estado, producto.sector FROM producto INNER JOIN cotizacion_producto ON cotizacion_producto.idProducto = producto.idProducto INNER JOIN tipo_producto ON producto.idTipoProducto = tipo_producto.idTipoProducto WHERE cotizacion_producto.idCotizacion = ". $sId);
    return(mysqli_fetch_all($result));
  }

  function consultarUsuario($sId) {
    $mysqli = new mysqli("localhost", "root", "", "planok");
    $result = $mysqli->query("SELECT usuario.rut, perfil.descripcion, usuario.nombre, usuario.apellido, usuario.correo, usuario.edad, usuario.sexo, usuario.estado FROM usuario INNER JOIN cotizacion ON cotizacion.idUsuario = usuario.id INNER JOIN perfil ON perfil.idPerfil = usuario.idPerfil WHERE cotizacion.idCotizacion = ". $sId);
    return(mysqli_fetch_all($result));
  }
?>
