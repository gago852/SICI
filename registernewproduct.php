<?php
	if (isset($_POST['Descripcion'])) {
		$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");
		NuevoProducto($_POST['tipo'], $_POST['modelo'], $_POST['Descripcion'], $_POST['precio'], $_SESSION["codigo"], $mysqli);
	}
	function NuevoProducto($tipo, $modelo, $descripcion, $precio, $codigo, $mysqli){
			$sentencia="INSERT INTO productos SET tipo='".$tipo."', modelo='".$modelo."', Descripcion='".$descripcion."', precio='".$precio."', cod_usu='".$codigo."' ";
			$mysqli->query($sentencia) or die (mysqli_error(0));
	}
	echo "<script type='text/javascript'>
	window.location='productos.php';
</script>";
?>
