<?php
	error_reporting(0);	
	include 'conexion.php';
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	$nomEmp = $_POST['nomEmp'];
	$codigoEmp = $_POST['codigoEmp'];
	$nomRep = $_POST['nomRep'];
	$CorreoE = $_POST['CorreoE'];
	$telCont = $_POST['telCont'];
	$
	$cifra = $pass;
	$pass= cifrarSHA256($cifra);
	
	function cifrarSHA256($texto) {
		return hash('sha256', $texto);
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
	<header id="headerRegEmp">
		<img src="img/SAR svg/1.svg" id="logo">
		<!--<a href="./carritodecompras.php" title="Ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>-->
	</header>
	<br><br><br>
	<div id="divmain">
		<div id="divForm">
			<form id="formRegEmp" method="POST" action="upload.php" enctype="multipart/form-data">
				<br>
				<center>
                <table id="tableRegEmp">
					<tr>
						<td colspan="2">
							<h1 id="themeTitles">Registro de nuevas empresas</h1>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h3 id="themeTitles">Powered by Corporativo SAR</h3>
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
                            <input type="text" id="corCont" name="CorreoE" placeholder="Ej. admin@innsolcorp.com" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Teléfono de contacto</label>
                        </td>
                        <td>
                            <input type="number" id="telCont" name="telCont" placeholder="Ej. 5589547249" required="true" pattern="[0-9]+" step="1" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/><p style="font-size: 12px;">(Máximo 15 dígitos)</p>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Logotipo</label>
                        </td>
                        <td>
                            <input type="file"  name="file" placeholder="Ej. formato .jpg .png" required="true">
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
                            <label for="nomEmp" id="labRegForm">Tema a elegir</label>
                        </td>
                        <td>
                            <select name="temaEmp" id="temaEmp" onchange="themeTest()">
								<option value="">Standar</option>	
								<option value="CSS/customStyle_Turism.css">Turism</option>
								<option value="CSS/customStyle_Tech.css">Tech</option>								
							</select>							
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><br><br><input type="submit" name="registrarEmp" value="Registrar empresa" class="registrarEmp" id="registrarEmp">
                        </td>  
						<td>
							<br><br><br><input type="button" onclick="nuevo();" value="Necesito ayuda" id="regBt">
                        </td>              
                    </tr>             
                </table>
				</center>
			</form>
			<br><br><br>
		</div>
	</div>
</body>
<script>
	function nuevo() {
		alert("Por favor, escribe al administrador del sistema o contacta al correo contacto@corporativosaarme.com");
	}

	function themeTest() {
		/*var table = document.getElementById('tableRegEmp');
		table.getElementsByTagName('h1');*/
		var themeButtons = document.getElementById('registrarEmp');
		var themeAllLabels = document.getElementById('formRegEmp');
		themeAllLabels.getElementsByTagName("label");
		var themeTitles = document.getElementById('themeTitles');
		var selThem = document.getElementById('temaEmp').selectedIndex;
		var them = document.getElementById('temaEmp').options;
		var headerTheme = document.getElementById('headerRegEmp');
		if (them[selThem].text == "Turism") {
			headerTheme.style.backgroundColor="rgb(220, 122, 36)";
			themeTitles.style.color="rgb(220, 122, 36)";
			themeAllLabels.style.color="black";
			themeButtons.style.backgroundColor="rgb(220, 122, 36)";
		}
		else if (them[selThem].text == "Tech") {
			headerTheme.style.backgroundColor="#0a71ac";
			themeAllLabels.style.color="#0a71ac";
			themeTitles.style.color="black";
			themeButtons.style.backgroundColor="#0a71ac";

		}
		else if (them[selThem].text == "Standar") {
			headerTheme.style.backgroundColor="#4a4a4a";
			themeTitles.style.color="black";
			themeAllLabels.style.color="black";
			themeButtons.style.backgroundColor="#f13453";
		}
		//alert("Hola:"+them[selThem].text);
	}
</script>
</html>
<?php
if (!isset($_POST['username'])) {
			die();
	}
?>