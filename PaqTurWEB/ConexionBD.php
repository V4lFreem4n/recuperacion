<?php

//conectar al servidor
$host="localhost";
$usuario="root";
$clave="";
$bd="soapaqtur";

$conexion=mysqli_connect($host,$usuario,$clave,$bd);

if($conexion->connect_errno)
	{
		die("Fallo de Conexión:(".$conexion ->mysqli_connect_errno().")".$conexion ->mysqli_connect_error());	
	}
////////

?>