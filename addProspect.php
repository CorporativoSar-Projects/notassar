<?php
	include 'conexion.php';	
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/styleSAR.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Añadir prospecto</title>
</head>
<style>
	form{
		text-align: center;
		border: 0px solid red;
	}
	table{
		width: 100% !important;
	}
	input, select{
		width: 50% !important;
	}
</style>
<body>
	<br>
	<form action="dataprocess.php" method="GET" style="width: 100%;">
		<h5>Nuevo prospecto</h5><br>
		<table>
			<tr>
				<td>
					<label>Nombre</label>
				</td>
				<td>
					<input type="text" name="nomProsp" required="true" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Domicilio o ubicación</label>
				</td>
				<td>
					<input type="text" name="domProsp" required="true"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Industria</label>
				</td>
				<td>
					<select name="indProsp" id="indProsp" required="true">
						<option value="Financiera">Financiera</option>
						<option value="Hotelera">Hotelera</option>
						<option value="Inmobiliaria">Inmobiliaria</option>
						<option value="Restaurantera">Restaurantera</option>
						<option value="TI">Tecnologías de la información</option>
						<option value="Turistica">Turística</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Representante</label>
				</td>
				<td>
					<input type="text" name="nomRep" required="true"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Teléfono de contacto</label>		
				</td>
				<td>
					<input type="number" name="telProsp" required="true" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Correo electrónico</label>
				</td>
				<td>
					<input type="text" name="correoProsp" id="correoProsp" required="true" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Servicio de interés</label>
				</td>
				<td>
					<select name="servIntProsp" id="servIntProsp" required="true">
						<option value="pdmktdig">Plan Despega - MKT Digital</option>
						<option value="pbmktdig">Plan Básico - MKT Digital</option>
						<option value="pbplusmktdig">Plan Básico plus - MKT Digital</option>
						<option value="ptmktdig">Plan Total - MKT Digital</option>
						<option value="pemktdig">Plan Exponencial - MKT Digital</option>
						<option value="ds">Desarrollo de software</option>
						<option value="capms365">Consultoría y capacitación MS365</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Origen</label>		
				</td>
				<td>
					<select name="origenProsp" id="origenProsp" required="true">
						<option value="Email">E-mail</option>
						<option value="Facebook">Facebook</option>
						<option value="Google">Google</option>
						<option value="Instagram">Instagram</option>
						<option value="Linkedin">Linkedin</option>
						<option value="Referido">Referido</option>
						<option value="WhatsApp">WhatsApp</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Estatus</label>
					<input name="flagDataProcess" type="text" value="ap" style="display: none;"/>
				</td>
				<td>
					<select name="estatusProsp" id="estatusProsp" disabled="true">
						<option value="nuevo">Nuevo</option selected>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input type="submit" value="Añadir prospecto">
				</td>
			</tr>
		</table>
	</form>
</body>
<script>

</script>
</html>