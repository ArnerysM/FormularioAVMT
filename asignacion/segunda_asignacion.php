<?php
function actualizar () /* Iniciar la función publica llamada "actualizar"*/
{
	extracto ($_POST);
	$db = new clasedb ();
	$conex = $db-> conectar ();
	$sql = "SELECCIONAR * DESDE datos_personales WHERE cedula =". $cedula. " AND id <> ". $id_persona;
	$res = mysqli_query ($conex, $sql);
	$cant = mysqli_num_rows ($res);
	if ($cant> 0) {
		/*se cierran las llaves PHP asi para poder escribir codigos en textos plano*/
?>
		<script type = "text/javascript">
			alert("la cedula se encuentra actualmente registrada");
			window.location = "PersonasControlador.php?operacion=index";
		</script>
<?php
	} else {
		$sql = "UPDATE datos_personales SET nombres = '". $nombres. "', apellidos = '". $apellidos. "' cedula = '". $cedula. " WHERE id =". $id_persona;
		$res = mysqli_query ($conex, $sql);
		if ($res) {
		/*Se cierran las llaves PHP asi para poder escribir codigos en textos plano*/
?>
			<script type = "text/javascript">
				alert("el registro ha sido modificaro");
				window.location = "PersonasControlador.php?operaion=index";
			</script>
<?php
		} else {
?>
			<script type = "text/javascript">
				alert("hubo un problema modificando el registro");
				window.location = "PersonasControlador.php?operaion=index";
			</script>
<?php
		}
	}
}
?>