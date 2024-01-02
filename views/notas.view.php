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
	<!-- Incluimos los estilos default  -->
    <?php include_once 'partials/styles.php' ?>
	<link rel="stylesheet" type="text/css" href="./css/notas.css">
</head>
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
					<h5 style="text-align: left !important; margin-left: 100px !important;">FECHA: &nbsp&nbsp <?php echo $fecha;?>
				</td>				
			</tr>
		</table>
		<br><br>
		<form action="calculo.php" name="notas" method="POST">
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
			<table id="customerDataTableNotas">
				<tr>
					<td>
						<h5>Nombre del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="nomCliente" required="true"/></h5>
					</td>
					<td>
						<h5>Correo del Cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="corrCliente" required="true"/></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Telefono del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="tel" name="telefono" required="true"/></h5>
					</td>
					<td>
						<h5>Domicilio del cliente&nbsp&nbsp
					</td>
					<td>
						<input type="text" name="domicilio" required="true"/></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Fecha de Inicio&nbsp&nbsp
					</td>
					<td>
						<input type="date" name="fechaI" required="true"></h5>
					</td>
					<td>
						<h5>Fecha de Termino&nbsp&nbsp
					</td>
					<td>
						<input type="date" name="fechaT" required="true"></h5>
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
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>
							<select name="idservicio" id="idservicio" required="true">
							<?php							
								while ($valor=$stmtNombres->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option value=".urlencode($valor['PR_Id'])."
										>".$valor['PR_Name']."</option>";
									
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
								while ($valor=$stmtNombres->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option value=".urlencode($valor['PR_Id'])."
										>".$valor['PR_Name']."</option>";
									
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
								while ($valor=$stmtNombres->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option value=".urlencode($valor['PR_Id'])."
										>".$valor['PR_Name']."</option>";
								
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
								while ($valor=$stmtNombres->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option value=".urlencode($valor['PR_Id'])."
										>".$valor['PR_Name']."</option>";
									
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
<script src="scripts/notas.js"></script>
</html>