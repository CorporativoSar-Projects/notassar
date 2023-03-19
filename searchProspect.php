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
	<link rel="stylesheet" href="css/styleSAR.css">
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
		border: 2px solid red;
	}
	input, select{
		width: 50% !important;
	}
	#opSearch{
		width: 50% !important;
		text-align: center;
	}
</style>
<body>
	<br>
	<h4 align="center">Buscar prospectos</h4>
	<p style="color: red; text-align: center;">Busca un prospecto en específico en toda la base de datos.</p>
	<br>
	<table id="pb">
		<tr>
			<td>
				<p id="pb">Realizar búsqueda por:</p>
			</td>
			<td>
				<select name="opSearch" id="opSearch">
					<option value="xnombre">Nombre</option>
					<option value="xcorreo">Correo electrónico</option>
					<option value="xindustrua">Industria</option>
					<option value="xrep">Representante</option>
				</select>
			</td>
		</tr>
	</table>
	<form action="dataprocess.php" method="GET" style="width: 100%;">
		<table>
			<tr>
				<td>
					<label>Nombre</label>
				</td>
				<td>
					<input type="text" name="nomProsp"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Industria</label>
				</td>
				<td>
					<select name="indProsp" id="indProsp" required="false">
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
					<input type="text" name="nomRep"/>
				</td>
			</tr>			
			<tr>
				<td>
					<label>Correo electrónico</label>
				</td>
				<td>
					<input type="text" name="correoProsp" id="correoProsp"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input type="submit" value="Buscar">
				</td>
			</tr>			
		</table>
	</form>
</body>
<script>

</script>
</html>