<?php
include("../Models/Cotizaciones.php");

$sId = $_POST['id'];
if ($sId != null) {
    $detalleCotizacion = consultarCotizacion($sId);
    $detalleCliente = consultarCliente($sId);
    $detalleProducto = consultarProducto($sId);
    $detalleUsuario = consultarUsuario($sId);
    $response = [$detalleCotizacion, $detalleCliente, $detalleProducto, $detalleUsuario];
    echo json_encode($response);
} else {
    echo json_encode(consultarCotizaciones());
}
?>
