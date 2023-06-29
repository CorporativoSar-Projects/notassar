<?php
	error_reporting(0);
	//$conexion=mysqli_connect("localhost","corpo240_admin","upiicsa2022","corpo240_corporativosar");
	$conexion=mysqli_connect("localhost","root","","corporativo_sar");
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	$queU=("SELECT * FROM usuario_admin WHERE nom_usuario='$user' and pass_usuario='$pass'");
	$result=mysqli_query($conexion,$queU);
	if (mysqli_num_rows($result)>0) {
	//	echo "<script>alert('Num Cols: $x');</script>";
		session_start();
		$_SESSION['$user']=$user;
		header('Location:notas.php');
		/*echo "Valor 1 de S_SESSION: ".$_SESSION['$user'];*/
		
	}
	else if(mysqli_num_rows($result)==0){
	//echo "<script>alert('Credenciales erroneas');</script>";
	    
	}
	/*if (mysqli_num_rows($conexion->query($queU))>0)
	{
	    session_start();
		$_SESSION['$user']=$user;
		header('Location: notas.php');
	}
	else
	{
	    echo "Error al actualizar los datos, verifica los datos e inténtalo de nuevo.".mysqli_error($conexion);
	}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link rel="shortcut icon" href="img/1.png" />
</head>
<style>
	body{
		background-color: white;
	}
	p{
		font-size: 40px;
	}
</style>
<body style="font-family:arial;">
	<header>
		<img src="img/SAR svg/1.svg" id="logo">
		<!--<a href="./carritodecompras.php" title="Ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>-->
	</header>
	<div id="divmain">
		<div id="divForm">
			<form id="formulario" method="POST">
				<h1>Bienvenido Corporativo SAR</h1>
				<h3>Powered by Corporativo SAR</h3>
				<br>
				<br>
				<img src="img/user.png" id="imU"><br><br>
				<label for="usuario">Usuario</label><br>
				<input type="text" id="usuario" name="username" placeholder="usuario" required="true"><br><br>
				<label for="password">Password</label><br>
				<input type="password" id="password" name="pass" placeholder="password" required="true"><br><br><br>
				<input type="submit" name="aceptar" value="Ingresar" class="aceptar">
				<br><br>
				<input type="button" onclick="nuevo();" value="Soy nuevo usuario y no tengo accesos" id="regBt">
				<br><br><br><br>
			</form>
		</div>
	</div>
</body>
<script>
	function nuevo() {
		alert("Por favor, escribe al administrador del sistema o contacta al correo lsanchezc@corporativosaarme.com");
	}
</script>
</html>
<?php
if (!isset($_POST['username'])) {
			die();
	}
?>