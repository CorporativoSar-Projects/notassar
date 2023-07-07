<?php 
    session_start();
	include 'conexion.php';
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	$varsesion=$_SESSION['$user'];
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
	$cont=1;
	$rs = mysqli_query($conexion, "SELECT MAX(folio_nota) AS id FROM nota");
	if ($row = mysqli_fetch_row($rs)) {
		$id = trim($row[0]);
		/*echo "Valor de id:".$id;*/
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styleSAR.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/1.png"/>
	<title>Notas Corporativo SAR</title>
</head>
<body onload="ocultarInicio();">
	<?php include 'menu.php'; ?>
	<br><br>
	<h1><center>Bienvenidos Corporativo SAR</center></h1>
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
			<h5>FOLIO: &nbsp&nbsp<input type="text" name="folio" disabled/>
					<?php
					if ($id==0) {
						echo "<script>document.notas.folio.value=1;</script>";				
					}
					else{
						$id=$id+1;
						echo "<script>document.notas.folio.value=".$id.";</script>";
					}
					echo "<script>document.notas.folio.disabled='true';</script>";
					?>
					<input type="text" name="dataFolio" style="display: none;" value="<?php echo $id;?>">
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
			<h5>Domicilio del cliente&nbsp&nbsp<input type="text" name="domCliente" required="true"/></h5><br><br>
			<table>
				<tr>
					<td>
						<h5>ID SERVICIO&nbsp&nbsp</h5>
					</td>
					<td>
						<h5>CANTIDAD&nbsp&nbsp</h5>
					</td>
					<td>
						<h5 id="tDesc1">DESCRIPCIÓN&nbsp&nbsp</h5>
					</td>
					<td>
						<h5>PRECIO&nbsp&nbsp</h5>
					</td>
					<td>
						<h5 id="titImporte">IMPORTE&nbsp&nbsp</h5>
					</td>
				</tr>
				<tr>
					<td>
						<select name="idservicio" id="idservicio">
						<?php							
							$selectServices="SELECT id_servicio, nom_servicio, desc_servicio, precio_servicio FROM servicio";
							$q=$conexion->query($selectServices);
							while ($valor=mysqli_fetch_array($q))
							{								
								echo "<option value=".$valor[id_servicio]."
									>".$valor[nom_servicio]."</option>";									
							}
						?>
						</select>
					</td>
					<td>
						<input type="number" name="cantidad" />
					</td>
					<td>
						<input type="text" name="descripcion" id="descServ1" />
					</td>
					<td>
						<input type="number" name="precio" id="precio" step="0.01" />
					</td>
					<td>
						<input type="number" name="importe" onclick="calculo();" step="0.01" />
					</td>
				</tr>
				<tr><!--Fila 2-->
					<td>
						<select name="idservicio2" id="idservicio">
						<?php
							$selectServices="SELECT id_servicio, nom_servicio FROM servicio";
							$q=$conexion->query($selectServices);
							while ($valor=mysqli_fetch_array($q))
							{
								echo "<option value=".$valor[id_servicio]."
									>".$valor[nom_servicio]."</option>";									
							}
						?>
						</select>						
					</td>
					<td>
						<input type="number" name="cantidad2" />
					</td>
					<td>
						<input type="text" name="descripcion2" id="descServ2"/>
					</td>
					<td>
						<input type="number" name="precio2" step="0.01"/>
					</td>
					<td>
						<input type="number" name="importe2" onclick="calculo();" step="0.01"/>
					</td>
				</tr>
				<tr><!--Fila 3-->
					<td>
						<select name="idservicio3" id="idservicio">
						<?php
							$selectServices="SELECT id_servicio, nom_servicio FROM servicio";
							$q=$conexion->query($selectServices);
							while ($valor=mysqli_fetch_array($q))
							{
								echo "<option value=".$valor[id_servicio]."
									>".$valor[nom_servicio]."</option>";									
							}
						?>
						</select>
					</td>
					<td>
						<input type="number" name="cantidad3" />
					</td>
					<td>
						<input type="text" name="descripcion3" id="descServ3"/>
					</td>
					<td>
						<input type="number" name="precio3" step="0.01"/>
					</td>
					<td>
						<input type="number" name="importe3" onclick="calculo();" step="0.01"/>
					</td>
				</tr>
				<tr><!--Fila 4-->
					<td>
						<select name="idservicio4" id="idservicio">
						<?php
							$selectServices="SELECT id_servicio, nom_servicio FROM servicio";
							$q=$conexion->query($selectServices);
							while ($valor=mysqli_fetch_array($q))
							{
								echo "<option value=".$valor[id_servicio]."
									>".$valor[nom_servicio]."</option>";									
							}
						?>
						</select>
					</td>
					<td>
						<input type="number" name="cantidad4" />
					</td>
					<td>
						<input type="text" name="descripcion4" id="descServ4"/>
					</td>
					<td>
						<input type="number" name="precio4" step="0.01"/>
					</td>
					<td>
						<input type="number" name="importe4" onclick="calculo();" step="0.01"/>
					</td>
				</tr>
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