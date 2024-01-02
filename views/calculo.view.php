<!DOCTYPE html>
<html lang="en">
<head>
	<!--
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jspdf.es.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<? echo $tema;?>">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/1.png"/>
</head>
<style>
	#bCG{
		display: none;
	}
	td select{
		width: 100%;
	}
	td input{
		width: 100%;
	}
	#tableTitlesQuantity{
		width: 100% !important;
	}
</style>
<body onload="inicial()">
	<?php include 'menu.php'; ?>
	<br><br>
	<h1><center>Bienvenido Corporativo SAR</center></h1>
	<br><br>
	<center>
		<table>
			<tr>
				<td>
					<h5 style="text-align: left !important; margin-left: 100px !important;">FECHA: &nbsp&nbsp<?php print_r($hoy);?>
				</td>
				<td>
					
				</td>
			</tr>
		</table>		
		<br><br>
		<form action="calculo.php" name="notas" method="GET">
			<h5>FOLIO: &nbsp&nbsp<input type="text" name="folio" value="<?php echo $folio?>"/>
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
			<table id="customerDataTableNotas">
				<tr>
					<td>
						<h5>Nombre del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="nomCliente" required="true" value="<?php echo $nombreCli?>"/></h5>
					</td>
					<td>
						<h5>Correo del Cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="corrCliente" required="true" value="<?php echo $correo?>"/></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Telefono del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="tel" name="telefono" required="true" value="<?php echo$telefono;?>"/></h5>
					</td>
					<td>
						<h5>Domicilio del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="domCliente" required="true" value="<?php echo $domicilio?>"/></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Fecha de Inicio&nbsp&nbsp
					</td>
					<td>
						<input type="date" name="fechaI" required="true" value="<?php echo$fechaI;?>"></h5>
					</td>
					<td>
						<h5>Fecha de Termino&nbsp&nbsp
					</td>
					<td>
						<input type="date" name="fechaT" required="true" value="<?php echo$fechaT;?>"></h5>
					</td>
				</tr>
			</table>
			<br>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">SERVICIO</th>
						<th scope="col">CANTIDAD</th>
						<th scope="col">PRECIO UNITARIO</th>
						<th scope="col" id="titImporte">IMPORTE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>
							<select name="idservicio" id="idservicio" disabled="true">
							<?php						
									echo "<option value=".'1'."
										>".$nombre."</option>";
								?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad" value="<?php echo $cantidad; ?>" disabled="true"/>
						</td>
						<td>
							<input type="number" name="precio" step="0.01" value="<?php							
								echo $precio
								?>" disabled="true"/>
						</td>
						<td>
						<input type="number" name="importe" onclick="calculo();" step="0.01" value="<?php echo $importe; ?>" disabled="true"/>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>
							<select name="idservicio2" id="idservicio" disabled="true">
							<?php							
								echo "<option value=".'1'."
								>".$nombre2."</option>";
								?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad2" value="<?php echo $cantidad2; ?>" disabled="true"/>
						</td>
						<td>
							<input type="number" name="precio2" step="0.01" value="<?php echo $precio2; ?>" disabled="true"/>
						</td>
						<td>
						<input type="number" name="importe2" onclick="calculo();" step="0.01" value="<?php echo $importe2; ?>" disabled="true"/>
						</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>
							<select name="idservicio3" id="idservicio" disabled="true">
							<?php							
								echo "<option value=".'1'."
								>".$nombre3."</option>";
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad3" value="<?php echo $cantidad3; ?>" disabled="true"/>
						</td>
						<td>
							<input type="number" name="precio3" step="0.01" value="<?php echo $precio3; ?>" disabled="true"/>
						</td>
						<td>
						<input type="number" name="importe3" onclick="calculo();" step="0.01" value="<?php echo $importe3; ?>" disabled="true"/>
						</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>
							<select name="idservicio4" id="idservicio" disabled="true">
							
							<?php							
								echo "<option value=".'1'."
								>".$nombre4."</option>";
							?>
							</select>
						</td>
						<td>
							<input type="number" name="cantidad4" value="<?php echo $cantidad4; ?>" disabled="true"/>
						</td>
						<td>
							<input type="number" name="precio4" step="0.01" value="<?php echo $precio4; ?>" disabled="true"/>
						</td>
						<td>
						<input type="number" name="importe4" onclick="calculo();" step="0.01" value="<?php echo $importe4; ?>" disabled="true"/>
						</td>
					</tr>					
				</tbody>
				</table>
			<br><br>
			<input id="bCG" type="submit" value="Calcular pagos"/>
		</form>
	<table id="tableTitlesQuantity" style="max-width: 100% !important; text-align:center !important;">
		<tr>
			<td>
				<h5>SUBTOTAL: </h5>
			</td>
			<td>
				<h5>IVA: </h5>
			</td>
			<td>
				<h5>RETENCIÓN IVA: </h5>
			</td>
			<td>
				<h5>RETENCIÓN ISR: </h5>
			</td>
			<td>
				<h5>TOTAL: </h5>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
					echo "$ ".number_format($subtotal,2)." MXN";
				?>
			</td>
			<td>
				<?php if ($Notes->getIva()=='sinIVA') {
					$iva=0;
					echo "$ ".number_format($iva,2)." MXN";
				}
				elseif ($Notes->getIva()=='IVApf' || $Notes->getIva()=='IVApm') {
					$iva=$subtotal*0.16;
					echo "$ ".number_format($iva,2)." MXN";
				}

				?>
			</td>
			<td>
				<?php if ($Notes->getIva()=='sinIVA' || $Notes->getIva()=='IVApf') {
					$retiva=0;
					echo "$ ".number_format($retiva,2)." MXN";
				}
				elseif ($Notes->getIva()=='IVApm') {
					$retiva=$subtotal*0.106667;
					echo "$ ".number_format($retiva,2)." MXN";
				}
				?>
			</td>
			<td>
				<?php if ($Notes->getIva()=='sinIVA' || $Notes->getIva()=='IVApf') {
					$isr=0;
					echo "$ ".number_format($isr)." MXN";
				}
				elseif ($Notes->getIva()=='IVApm') {
					$isr=$iva*0.1;
					echo "$ ".number_format($isr,2)." MXN";
				}
				?>
			</td>
			<td>
				<?php
					$total=$subtotal+$iva-$retiva-$isr;
					echo "$ ".number_format($total,2)." MXN";
				?>
			</td>
		</tr>
	</table>
	<table style="max-width: 100% !important; text-align:center !important;">
		<tr>
			<td>
				<form action="insertar_nota.php" method="POST">
				<input type="text" name="folio" style="display: none;" value="<?php echo $folio; ?>"/><br>
				<input type="text" name="corrCliente" style="display: none;" value="<?php echo $Notes->getEmail();; ?>"/>
				<input type="text" name="telefono" style="display: none;" value="<?php echo $Notes->getPhone(); ?>"/>
				<input type="date" name="fechaI" style="display: none;" value="<?php echo $Notes->getInitDate(); ?>"/>
				<input type="date" name="fechaT" style="display: none;" value="<?php echo $Notes->getEndDate(); ?>"/>
				<input type="text" name="nomCliente" style="display: none;" value="<?php echo $Notes->getName(); ?>"/>
				<input type="text" name="domCliente" style="display: none;" value="<?php echo $Notes->getDirection(); ?>"/>
				<input type="text" name="tipoNota" style="display: none;" value="<?php echo $Notes->getIva(); ?>"/>
				<input type="text" name="idservicio" style="display: none;" value="<?php echo $idServicio; ?>"/>
				<input type="text" name="idservicio2" style="display: none;" value="<?php echo $idServicio2; ?>"/>
				<input type="text" name="idservicio3" style="display: none;" value="<?php echo $idServicio3; ?>"/>
				<input type="text" name="idservicio4" style="display: none;" value="<?php echo $idServicio4; ?>"/>
				<input type="text" name="cantidad" style="display: none;" value="<?php echo $cantidad; ?>"/>
				<input type="text" name="cantidad2" style="display: none;" value="<?php echo $cantidad2; ?>"/>
				<input type="text" name="cantidad3" style="display: none;" value="<?php echo $cantidad3; ?>"/>
				<input type="text" name="cantidad4" style="display: none;" value="<?php echo $cantidad4; ?>"/>
				<input type="text" name="descripcion" style="display: none;" value="<?php echo $nombre; ?>"/>
				<input type="text" name="descripcion2" style="display: none;" value="<?php echo $nombre2; ?>"/>
				<input type="text" name="descripcion3" style="display: none;" value="<?php echo $nombre3; ?>"/>
				<input type="text" name="descripcion4" style="display: none;" value="<?php echo $nombre4; ?>"/>
				<input type="text" name="precio" style="display: none;" value="<?php echo $precio; ?>"/>
				<input type="text" name="precio2" style="display: none;" value="<?php echo $precio2; ?>"/>
				<input type="text" name="precio3" style="display: none;" value="<?php echo $precio3; ?>"/>
				<input type="text" name="precio4" style="display: none;" value="<?php echo $precio4; ?>"/>
				<input type="text" name="importe" style="display: none;" value="<?php echo $importe; ?>"/>
				<input type="text" name="importe2" style="display: none;" value="<?php echo $importe2; ?>"/>
				<input type="text" name="importe3" style="display: none;" value="<?php echo $importe3; ?>"/>
				<input type="text" name="importe4" style="display: none;" value="<?php echo $importe4; ?>"/>
				<input type="text" name="subtotal" style="display: none;" value="<?php echo $subtotal; ?>"/>
				<input type="text" name="iva" style="display: none;" value="<?php echo $iva; ?>"/>
				<input type="text" name="retiva" style="display: none;" value="<?php echo $retiva; ?>"/>
				<input type="text" name="isr" style="display: none;" value="<?php echo $isr; ?>"/>
				<input type="text" name="total" style="display: none;" value="<?php echo $total; ?>"/>
				<input type="text" name="fecha" style="display: none;" value="<?php echo $hoy; ?>"/><br>
				<input type="submit" value="Guardar datos y continuar" id="btGenera"/>
				</form>
			</td>
		</tr>
	</table>
	</center>
	<br><br>
</body>
<script>
	
	$(document).ready(function()
		{
			$('#btGenera').click(function()
				{
					insertar();
				});
		});

	function inicial() {
		var f="<?php echo $folio ?>";
		var tn="<?php echo $Notes->getIva() ?>";
		var nc="<?php echo $nomCliente; ?>";
		var dc="<?php echo $domCliente; ?>";
		document.notas.folio.value=f;
		document.notas.folio.disabled=true;
		document.notas.tipoNota.value=tn;
		document.notas.nomCliente.value=nc;
		document.notas.domCliente.value=dc;
		/*Llenado de campos fila 1*/
		var ids="<?php echo $idServicio; ?>";
		var c="<?php echo $cantidad; ?>";
		var d="<?php echo $descripcion; ?>";
		var p="<?php echo $precio; ?>";
		var i="<?php echo $importe; ?>";
		
		//document.notas.idservicio.value="HOLA TEST";
		document.notas.idservicio.value=ids;
		document.notas.cantidad.value=c;
		document.notas.descripcion.value=d;
		document.notas.precio.value=p;
		document.notas.importe.value=i;

		/*Llenado de campos fila 2*/
		var ids2="<?php echo $idServicio2; ?>";
		var c2="<?php echo $cantidad2; ?>";
		var d2="<?php echo $descripcion2; ?>";
		var p2="<?php echo $precio2; ?>";
		var i2="<?php echo $importe2; ?>";
		
		document.notas.idservicio2.value=ids2;
		document.notas.cantidad2.value=c2;
		document.notas.descripcion2.value=d2;
		document.notas.precio2.value=p2;
		document.notas.importe2.value=i2;

		/*Llenado de campos fila 3*/
		var ids3="<?php echo $idServicio3; ?>";
		var c3="<?php echo $cantidad3; ?>";
		var d3="<?php echo $descripcion3; ?>";
		var p3="<?php echo $precio3; ?>";
		var i3="<?php echo $importe3; ?>";
		
		document.notas.idservicio3.value=ids3;
		document.notas.cantidad3.value=c3;
		document.notas.descripcion3.value=d3;
		document.notas.precio3.value=p3;
		document.notas.importe3.value=i3;

		/*Llenado de campos fila 4*/
		var ids4="<?php echo $idServicio4; ?>";
		var c4="<?php echo $cantidad4; ?>";
		var d4="<?php echo $descripcion4; ?>";
		var p4="<?php echo $precio4; ?>";
		var i4="<?php echo $importe4; ?>";
		
		document.notas.idservicio4.value=ids4;
		document.notas.cantidad4.value=c4;
		document.notas.descripcion4.value=d4;
		document.notas.precio4.value=p4;
		document.notas.importe4.value=i4;

		document.notas.tipoNota.disabled=true;
		document.notas.nomCliente.disabled=true;
		document.notas.domCliente.disabled=true;
		document.notas.idservicio.disabled=true;
		document.notas.idservicio2.disabled=true;
		document.notas.idservicio3.disabled=true;
		document.notas.idservicio4.disabled=true;
		document.notas.cantidad.disabled=true;
		document.notas.cantidad2.disabled=true;
		document.notas.cantidad3.disabled=true;
		document.notas.cantidad4.disabled=true;
		document.notas.descripcion.disabled=true;
		document.notas.descripcion2.disabled=true;
		document.notas.descripcion3.disabled=true;
		document.notas.descripcion4.disabled=true;
		document.notas.precio.disabled=true;
		document.notas.precio2.disabled=true;
		document.notas.precio3.disabled=true;
		document.notas.precio4.disabled=true;
		document.notas.importe.disabled=true;
		document.notas.importe2.disabled=true;
		document.notas.importe3.disabled=true;
		document.notas.importe4.disabled=true;
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