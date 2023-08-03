<?php
	error_reporting(0);
	
	$conexion=mysqli_connect("localhost", "id20796694_root", 'upiic$A5', "id20796694_basedatos");
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
	<br><br><br>
	<div id="divmain">
		<div id="divForm">
			<form id="formRegEmp" method="POST">
				<br>
				<br>
				<center>
                <table>
					<tr>
						<td colspan="2">
							<h1>Registro de nuevas empresas</h1>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h3>Powered by Corporativo SAR</h3>
							<br><br>
						</td>
					</tr>
                    <tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Nombre de empresa</label>
                        </td>
                        <td>
                            <input type="text" id="nomEmp" name="nomEmp" placeholder="Ej. Innsol Corporation" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="codigoEmp" id="labRegForm">Código de empresa</label>
                        </td>
                        <td>
                            <input type="text" id="codigoEmp" name="codigoEmp" placeholder="Ej. INNCORP" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nomRep" id="labRegForm">Nombre de representante</label>
                        </td>
                        <td>
                            <input type="text" id="nomRep" name="nomRep" placeholder="Ej. Luis Sánchez" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Correo de contacto</label>
                        </td>
                        <td>
                            <input type="text" id="corCont" name="corCont" placeholder="Ej. admin@innsolcorp.com" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Teléfono de contacto</label>
                        </td>
                        <td>
                            <input type="number" id="telCont" name="telCont" placeholder="Ej. 5589547249" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Logotipo</label>
                        </td>
                        <td>
                            <input type="file" id="logEmp" name="logEmp" placeholder="Ej. formato .jpg .png" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Sitio web oficial</label>
                        </td>
                        <td>
                            <input type="text" id="sitWeb" name="sitWeb" placeholder="Ej. www.inncorp.com" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Dirección</label>
                        </td>
                        <td>
                            <input type="text" id="dirEmp" name="dirEmp" placeholder="Ej. Copernico 23, Miguel Hidalgo, CDMX, 02380" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><br><br><br><input type="submit" name="registrarEmp" value="Registrar empresa" class="registrarEmp">
                        </td>  
						<td>
							<br><br><br><br><input type="button" onclick="nuevo();" value="Necesito ayuda" id="regBt">
                        </td>              
                    </tr>                   
                </table>
				</center>
			</form>
		</div>
	</div>
</body>
<script>
	function nuevo() {
		alert("Por favor, escribe al administrador del sistema o contacta al correo contacto@corporativosaarme.com");
	}
</script>
</html>
<?php
if (!isset($_POST['username'])) {
			die();
	}
?>