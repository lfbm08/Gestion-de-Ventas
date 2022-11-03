# Gestion de Ventas
Bienvenido a la prueba técnica de Plan Ok, a continuación encontrará el desarrollo de un sistema de gestión de ventas donde puede visualizar los usuarios del sistema y las cotizaciones con su respectivo detalle.

Para instalarlo de forma local recomiendo usar Xampp y clonar el repositorio en `C:/xampp/htdocs/`.

Luego se debe cargar la base de datos en MySql con el nombre `planok`.

Adjunto las consultas solicitadas en el segundo punto de la prueba:

1. Listado de clientes que han comprado estacionamientos en Santiago.

```
SELECT cliente.rut, cliente.nombre, producto.idProducto, tipo_producto.descripcion, producto.sector 
FROM producto
INNER JOIN tipo_producto ON tipo_producto.idTipoProducto = producto.idTipoProducto
INNER JOIN cotizacion_producto ON cotizacion_producto.idProducto = producto.idProducto
INNER JOIN cotizacion ON cotizacion.idCotizacion = cotizacion_producto.idCotizacion
INNER JOIN cliente ON cliente.id = cotizacion.idCliente
WHERE producto.sector = 'Santiago'
AND tipo_producto.descripcion = 'Estacionamiento'
AND producto.estado = 'VENDIDO'
```
2. Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.

```
SELECT COUNT(*)
FROM producto
INNER JOIN cotizacion_producto ON cotizacion_producto.idProducto = producto.idProducto
INNER JOIN cotizacion ON cotizacion_producto.idCotizacion = cotizacion.idCotizacion
INNER JOIN usuario ON usuario.id = cotizacion.idUsuario
WHERE producto.sector = 'Las Condes'
AND producto.estado = 'VENDIDO'
AND usuario.nombre = 'PILAR'
AND usuario.apellido = 'PINO'
```
3. Listar Productos creados entre el 2018-01-03 y 2018-01-20
```
SELECT * FROM producto
WHERE fechaCreacion
BETWEEN '2018-01-03' AND '2018-01-20'
```
4. Sumar el total de ventas realizadas en Santiago.
```
SELECT SUM(valorLista) FROM producto
WHERE estado = 'VENDIDO'
AND sector = 'Santiago';
```