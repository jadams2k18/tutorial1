<?php
require('config.php');
//
$error=false;
//
// Validar entradas
//
if (!isset($_POST["cedula"])) {
	$error=true;
	echo "Error: Campo de cedula vacio";
	}
if (!isset($_POST["nombre"])){
	$error=true;
	echo "Error: Campo de nombre vacio";	
	}
if (!isset($_POST["sueldo"]) || !is_numeric($_POST["sueldo"])){
	$error=true;
	echo "Error: Campo de sueldo vacio o valor no numerico";
	}
if (!isset($_POST["fecha"]) || !strtotime($_POST["fecha"])){
	$error=true;
	echo "Error: Campo de fecha vacio o valor de fecha no admitido";	
	}
//
if(!$error) {
	$cedula = $_POST["cedula"];
	$nombre = $_POST["nombre"];
	$sueldo = $_POST["sueldo"];
	$fecha =  $_POST["fecha"];

	$mysqli = new mysqli(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);

	/* Verificar errores de conexion con la BD */
	if ($mysqli->connect_error) {
		echo "Connection failed: " . $conn->connect_error;
	} 

	$sql = "INSERT INTO pagos (cedula, nombre, sueldo, fecha)
			VALUES ('$cedula', '$nombre', $sueldo, '$fecha')";

	if ($mysqli->query($sql) === TRUE) {
		echo "Nuevo registro creado exitosamente";
	} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
	
	$mysqli->close();  // Cerrar conexión
}

	echo "<BR><BR>";
	echo "<center><a href='form.html'>Volver a la carga de datos</a></center>"
?>
