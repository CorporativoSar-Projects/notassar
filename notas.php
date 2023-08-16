<?php 
    session_start();
	include 'conexion.php';
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	echo"<br>";
	$codE = $_SESSION['$CodiEmp'];
	$varsesion=$_SESSION['$user'];
	$foliio=$_SESSION['$folio'];
	$tema = $_SESSION['$Tema'];
	if($varsesion==null || $varsesion=='')
	{
    	echo 'Debes de iniciar sesion para poder ingresar';
    	header('Location: index.php');
		die();
	}
	global $cont;
	global $id;
	global $tmpPrecio;
	global $tmpDescripcion;
	global $optSelected;
	global $contServ;
	$contServ=0;
	global $serviceArray;
	$serviceArray = array();
	$cont=1;
	$rs = mysqli_query($conexion, "SELECT FOLIO FROM NotasS	WHERE FechaRegistro = (SELECT MAX(FechaRegistro) FROM NotasS where ID_Us = '$varsesion');");
	if ($row = mysqli_fetch_row($rs)) {
		$id = trim($row[0]);
		//cho "Valor de id:".$id;
	}
	else{
		$id=0;
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="<? echo $tema;?>">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/1.png"/>
	<title>Notas Corporativo SAR</title>
</head>
<style>
	td select{
		width: 100%;
	}
	td input{
		width: 100%;
	}
</style>
<body onload="ocultarInicio();">
	<?php include 'menu.php'; ?>
	<br><br>
	<div id="divGen">
		<h1><center>Bienvenido Corporativo SAR</center></h1>
	</div>
	<br><br>
	<center>
		<table>
			<tr>
				<td>
					<h5 style="text-align: left !important; margin-left: 100px !important;">FECHA: &nbsp&nbsp<?php $mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); $m=$mes[date(n)-1]; $hoy = date("j")." de ".$m." de ".date("Y"); print_r($hoy);?>
				</td>				
			</tr>
		</table>
		<br><br>
		<form action="calculo.php" name="notas" method="GET">
			<h5>FOLIO: &nbsp&nbsp<input type="text" name="folio" disabled value="<?php echo $foliio;?>"/>
					
					<input type="text" name="dataFolio" style="display: none;" value="<?php echo $foliio;?>">
					</h5>
					<br><br>
			<h4>Tipo de nota a generar:</h4>
			<br>			
			<select name="tipoNota" id="tipoNota">
				<option value="sinIVA">Sin IVA</option>
				<option value="IVApf">IVA PF</option>
				<option value="IVApm">IVA PM</option>
			</select>
			<br><br><br>
			<h5>Nombre del cliente&nbsp&nbsp<input type="text" name="nomCliente" required="true"/></h5><br>
			<h5>Correo del Cliente&nbsp&nbsp<input type="text" name="corrCliente" required="true"/></h5><br>
			<h5>Telefono del cliente&nbsp&nbsp<input type="text" name="telefono" required="true"/></h5><br>
			<h5>Domicilio del cliente&nbsp&nbsp<input type="text" name="domCliente" required="true"/></h5><br><br>		
			<h5>Fecha de Inicio&nbsp&nbsp<input type="date" name="fechaI" required="true"></h5><br>
			<h5>Fecha de Termino&nbsp&nbsp<input type="date" name="fechaT" required="true"></h5><br>			
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">SERVICIO</th>
						<th scope="col">CANTIDAD</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>
							<select name="idservicio" id="idservicio" required="true">
							<?php							
								$selectServices="Select NombrePS, PrecioU from ServiciosProductos where CEmpresa like '$codE';";
								$q=$conexion->query($selectServices);
								while ($valor=mysqli_fetch_array($q))
								{
									echo "<option value=".$valor['NombrePS']."
										>".$valor['NombrePS']."</option>";
									$serviceArray[$valor['NombrePS']]=$valor['PrecioU'];
								}
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad" required="true"/>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>
							<select name="idservicio2" id="idservicio2">
								<option value=""></option>
								<?php							
								$selectServices="Select NombrePS, PrecioU from ServiciosProductos where CEmpresa like '$codE';";
								$q=$conexion->query($selectServices);
								while ($valor=mysqli_fetch_array($q))
								{
									echo "<option value=".$valor['NombrePS']."
										>".$valor['NombrePS']."</option>";
									$serviceArray[$valor['NombrePS']]=$valor['PrecioU'];						
								}
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad2" />
						</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>
							<select name="idservicio3" id="idservicio3">
								<option value=""></option>
								<?php							
								$selectServices="Select NombrePS, PrecioU from ServiciosProductos where CEmpresa like '$codE';";
								$q=$conexion->query($selectServices);
								while ($valor=mysqli_fetch_array($q))
								{
									echo "<option value=".$valor['NombrePS']."
										>".$valor['NombrePS']."</option>";
									$serviceArray[$valor['NombrePS']]=$valor['PrecioU'];
								}
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad3" />
						</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>
						    	<select name="idservicio4" id="idservicio4">
						    	 <option value=""></option>
					        	<?php							
								$selectServices="Select NombrePS, PrecioU from ServiciosProductos where CEmpresa like '$codE';";
								$q=$conexion->query($selectServices);
								while ($valor=mysqli_fetch_array($q))
								{
									echo "<option value=".$valor['NombrePS']."
										>".$valor['NombrePS']."</option>";
									$serviceArray[$valor['NombrePS']]=$valor['PrecioU'];
								}
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad4" />
						</td>
					</tr>					
				</tbody>
				</table>
			<br><br>
			<input id="bCG" type="submit" value="Calcular pagos"/>
		</form>
	</center>
	<br><br>
</body>
<script>
	function ocultarInicio() {
		//Aqui ocultamos la columna de importe, para mostrarla después ya con el cálculo hecho.		
		document.getElementById('titImporte').style.display="none";
		document.notas.importe.style.display="none";
		document.notas.importe2.style.display="none";
		document.notas.importe3.style.display="none";
		document.notas.importe4.style.display="none";
	}

	function calculo() {
		var v=document.notas.precio.value;
		document.notas.importe.value=v;
	}

	function quitarServicio() {
		var e=document.getElementById('idservicio2');
		e.options[e.selectedIndex].text="Servicio borrado";
	}

	var currentLoc = window.location.href;
	var links = document.querySelectorAll('nav a');
	for (var i=0; i<links.length; i++) {
		if (links[i].href===currentLoc) {
			links[i].classList.add('active');
			break;
		}
	}
</script>
</html>