<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<? echo $tema;?>">
	<link rel="stylesheet" href="CSS/styleSAR.css">
	<link rel="shortcut icon" href="img/1.png" />
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Guardar Nota</title>
</head>
<body>
	<?php include 'menu.php'; ?>
	<br><br>
	<center><h3>RESUMEN DE NOTA</h3></center><br><br>
	<h4 align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<?php
	echo $correU."" .$fechaR."".$fechaI; 
	echo "Folio de nota: ".$folio;?></h4><h4 align="right"><?php echo "Fecha: ".$fecha;?>&nbsp&nbsp&nbsp&nbsp&nbsp</h4><br><br>
	<?php echo "<h4>&nbsp&nbsp&nbsp&nbsp&nbspNombre de cliente: ".$nomCliente."</h4><br>";
	echo "<h4>&nbsp&nbsp&nbsp&nbsp&nbspDomicilio: ".$domCliente."</h4><br>";
	$cabecera = array('ID SERVICIO','CANTIDAD','DESCRIPCIÓN','PRECIO','IMPORTE');
	$datos = array(
            array('ids' => $idservicio, 'cant' => $cantidad, 'desc' => $descripcion, 'prec' => $precio, 'imp' => $importe),
            array('ids' => $idservicio2, 'cant' => $cantidad2, 'desc' =>  $descripcion2, 'prec' => $precio2, 'imp' => $importe2),
            array('ids' => $idservicio3, 'cant' => $cantidad3, 'desc' =>  $descripcion3, 'prec' => $precio3, 'imp' => $importe3),
            array('ids' => $idservicio4, 'cant' => $cantidad4, 'desc' => $descripcion4, 'prec' => $precio4, 'imp' => $importe4)
            );
            ?>
            <br><br>
            <center>
    <table style="width: 100%;">
    	<tr>
    		<?php foreach ($cabecera as $fila) {
		echo "<td>".$fila."</td>"; }?>
    	</tr>
    		<?php foreach ($datos as $fila) {
    			echo "<tr><td>".$fila['ids']."</td>";
    			echo "<td>".$fila['cant']."</td>";
    			echo "<td>".$fila['desc']."</td>";
    			echo "<td>".$fila['prec']."</td>";
    			echo "<td>".$fila['imp']."</td></tr>";
    		}?>
		<tr>
			<td>
				<?php echo "<br><br>SUBTOTAL: ".$subtotal; ?>
			</td>
			<td>
				<?php echo "<br><br>+ IVA: ".$iva; ?>
			</td>
			<td>
				<?php echo "<br><br>- RETENCIÓN IVA: ".$riva; ?>
			</td>
			<td>
				<?php echo "<br><br>- RETENCIÓN ISR: ".$risr; ?>
			</td>
			<td>
				<?php echo "<br><br>TOTAL: ".$total; ?>
			</td>
		</tr>
	</table>
	<center>
	<table>
		<tr>
			<td>
				<form action="pdfGen.php" method="POST">
				<input type="number" name="folio" style="display: none;" value="<?php echo $folio; ?>"/><br>
				<input type="text" name="nomCliente" style="display: none;" value="<?php echo $nomCliente; ?>"/>
				<input type="text" name="domCliente" style="display: none;" value="<?php echo $domCliente; ?>"/>
				<input type="text" name="tipoNota" style="display: none;" value="<?php echo $tipoNota; ?>"/>
				<input type="text" name="idservicio" style="display: none;" value="<?php echo $idservicio; ?>"/>
				<input type="text" name="idservicio2" style="display: none;" value="<?php echo $idservicio2; ?>"/>
				<input type="text" name="idservicio3" style="display: none;" value="<?php echo $idservicio3; ?>"/>
				<input type="text" name="idservicio4" style="display: none;" value="<?php echo $idservicio4; ?>"/>
				<input type="text" name="cantidad" style="display: none;" value="<?php echo $cantidad; ?>"/>
				<input type="text" name="cantidad2" style="display: none;" value="<?php echo $cantidad2; ?>"/>
				<input type="text" name="cantidad3" style="display: none;" value="<?php echo $cantidad3; ?>"/>
				<input type="text" name="cantidad4" style="display: none;" value="<?php echo $cantidad4; ?>"/>
				<input type="text" name="descripcion" style="display: none;" value="<?php echo $descripcion; ?>"/>
				<input type="text" name="descripcion2" style="display: none;" value="<?php echo $descripcion2; ?>"/>
				<input type="text" name="descripcion3" style="display: none;" value="<?php echo $descripcion3; ?>"/>
				<input type="text" name="descripcion4" style="display: none;" value="<?php echo $descripcion4; ?>"/>
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
				<input type="text" name="retiva" style="display: none;" value="<?php echo $riva; ?>"/>
				<input type="text" name="isr" style="display: none;" value="<?php echo $risr; ?>"/>
				<input type="text" name="total" style="display: none;" value="<?php echo $total; ?>"/>
				<input type="text" name="fecha" style="display: none;" value="<?php echo $fecha; ?>"/><br>
				<h5 style="color:red;">Firma de conformidad:</h5><br><textarea name="firma" style="width: 60%;"></textarea><br><br><input type="submit" value="Generar PDF" id="btGenera"/>
				</form><br>
			</td>
			<tr>
				<td>
					<button id="btnn" onclick="nueva();">Nueva Nota</button><br><br>
				</td>
			</tr>
		</tr>
    </table>
</center>
</body>
<script>
	$(document).ready(function()
		{
			$('#btnn').click(function()
				{
					nueva();
				});
		});
	function nueva() {
		 window.location.href = "notas.php?$varsesion=$_SESSION['$user'];";
	}
</script>
</html>