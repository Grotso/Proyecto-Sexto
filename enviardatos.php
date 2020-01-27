<?php
$conexion = mysql_connect("localhost", "root", "proyecto","proyecto6");
mysql_select_db("conexion_se", $conexion);
mysql_query("SET NAMES 'utf8'");

$chipid = $_POST ['chipid1'];
$ dato= $_POST ['dato'];

mysql_query("INSERT INTO `conexion_se`.`registro` ( `id`,`chipId`, `fecha`, `descripcion`) VALUES (NULL, '$chipid1', CURRENT_TIMESTAMP, '$dato');");

mysql_close();

echo "Datos ingresados correctamente.";
?>
