<?php
function modificar() {
	/*se crea una funcion para modificar*/
	/*solicitar los datos que se envinarán por la udl*/
	extracto($_SOLICITUD);
	/*crear un objeto de la clase que maneja la conexión*/				
	$db = new clasedb();

	/*se realizar la conexion a la base de datos*/				
	$conex = $db-> conectar();

	/*se inicializa una variable que contendra la consulta*/
	$sql = "SELECT * FROM datos_personales WHERE id =".$id_persona;
	/*se ejecuta la consulta y se guarda el resultado en la variable*/
	$res = mysqli_query ($conex, $sql);
	/*extraer los resultados y guardarlos como un arreglo*/
	$datos = mysqli_fetch_array ($res);
	/*redireccionar al usuario llevandose los datos*/
	header ("Location: editar.php?data=". serialize ($data));
}
?>