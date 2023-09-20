<?php
	error_reporting(0);
	//conexion en local
	$conexion=mysqli_connect("localhost", "root",'', "notasinnsol");
	//conexion a produccion
	//$conexion=mysqli_connect("localhost", "corpo240_admin", 'INNSOL"="#()', "corpo240_InnsolNotas");
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	$cifra = $pass;
	$pass= cifrarSHA256($cifra);	
	function cifrarSHA256($texto) {
		return hash('sha256', $texto);
	}
	$queU=("SELECT Correo FROM UsuariosS  WHERE Correo='$user' and Pass='$pass'");
	$result=mysqli_query($conexion,$queU);
	if (mysqli_num_rows($result)>0) {
	//	echo "<script>alert('Num Cols: $x');</script>";
		session_start();
		$_SESSION['$user']=$user;
		header('Location:notas.php');		
		/*echo "Valor 1 de S_SESSION: ".$_SESSION['$user'];*/
		
	}
	$rs = mysqli_query($conexion, "SELECT Id_empresa FROM UsuariosS  WHERE Correo='$user';");
	if ($row = mysqli_fetch_row($rs)) {
		$id = trim($row[0]);
		$_SESSION['$CodiEmp'] = $id;
		//echo "Valor de id:".$id;
	}
	else{
		$id=0;
	}
	$cod=$_SESSION['$CodiEmp'];
	$fl = mysqli_query($conexion, "SELECT FOLIO FROM NotasS	WHERE FechaRegistro = (
		SELECT MAX(FechaRegistro) FROM NotasS where CodigoE = '$cod');");
	if ($row = mysqli_fetch_row($fl)) {
		$folio = trim($row[0]);
		/*echo "Valor de id:".$id;*/
		$folio = preg_replace_callback('/\d+/', function ($matches) {	return $matches[0] + 1;	}, $folio);
		$_SESSION['$folio'] = $folio;
	}
	else{
		$folio = $cod."1";
		$_SESSION['$folio'] = $folio;

	}	
	$tm = mysqli_query($conexion, "SELECT Tema From EmpresaC Where CodigoE = '$cod';");
	if ($row = mysqli_fetch_row($tm)) {
		$tem = trim($row[0]);
		$_SESSION['$Tema'] = $tem;
		//echo "Valor de id:".$id;
	}
	else{
		$id=0;
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link rel="shortcut icon" href="img/logo.png"/>
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
		<img src="img/logo.png" id="logo">
		<!--<a href="./carritodecompras.php" title="Ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>-->
	</header>
	<div id="divmain">
		<div id="divForm">
		    <br><br><br><br>
			<form id="formulario" method="POST">
			    <br><br>
				<h1>InNotes</h1>
				<h3>Powered by Innsol Corporation</h3>
				<br>
				<br>
				<img src="img/user.png" id="imU"><br><br>
				<table id="tabIndx" style="width:100%;">
				    <tr>
				        
				        <td>
				            <input type="text" id="usuario" name="username" placeholder="Correo electrónico" required="true">
				        </td>
				    </tr>
				    <tr>
				        
				        <td>
				            <input type="password" id="password" name="pass" placeholder="Contraseña" required="true">
				        </td>
				    </tr>
				    <tr>
				        <td colspan="2">
				            <br><br>
				            <input type="submit" name="aceptar" value="Ingresar" class="aceptar">
				        </td>
				    </tr>
				</table>
				<br>
			</form>
				<!--
				<label for="usuario">Usuario</label><br>
				<input type="text" id="usuario" name="username" placeholder="usuario" required="true"><br><br>
				<label for="password">Password</label><br>
				<input type="password" id="password" name="pass" placeholder="password" required="true"><br><br><br>
				<input type="submit" name="aceptar" value="Ingresar" class="aceptar">
				<br><br>
				<input type="button" onclick="nuevo();" value="Soy nuevo usuario y no tengo accesos" id="regBt">
				<br><br><br><br>
			-->
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