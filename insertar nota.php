<?php
    session_start();
    error_reporting(0);
	$nameL="Cuauhtémoc, Ciudad de México";
	$ign=$_POST['firma'];
	$nomCliente=$_POST['nomCliente'];
	$domCliente=$_POST['domCliente'];
	$idservicio=$_POST['idservicio'];
	$idservicio2=$_POST['idservicio2'];
	$idservicio3=$_POST['idservicio3'];
	$idservicio4=$_POST['idservicio4'];
	$cantidad=intval($_POST['cantidad']);
	$cantidad2=intval($_POST['cantidad2']);
	$cantidad3=intval($_POST['cantidad3']);
	$cantidad4=intval($_POST['cantidad4']);
	$descripcion=$_POST['descripcion'];
	$descripcion2=$_POST['descripcion2'];
	$descripcion3=$_POST['descripcion3'];
	$descripcion4=$_POST['descripcion4'];
	$precio=$_POST['precio'];
	$precio2=$_POST['precio2'];
	$precio3=$_POST['precio3'];
	$precio4=$_POST['precio4'];
	$importe=$_POST['importe'];
	$importe2=$_POST['importe2'];
	$importe3=$_POST['importe3'];
	$importe4=$_POST['importe4'];
	$tipoNota=$_POST['tipoNota'];
	$folio=$_POST['folio'];
	$fecha=$_POST['fecha'];
	$subtotal=$_POST['subtotal'];
	$subtotal=number_format($subtotal,2);
	$iva=$_POST['iva'];
	$iva=number_format($iva,2);
	$riva=$_POST['retiva'];
	$riva=number_format($riva,2);
	$risr=$_POST['isr'];
	$risr=number_format($risr,2);
	$total=$_POST['total'];
	$total=number_format($total,2);
	/*$riva=number_format($riva,2);*/
	if ($precio=='') {
		$precio=0;
	}
	if ($precio2=='') {
		$precio2=0;
	}
	if ($precio3=='') {
		$precio3=0;
	}
	if ($precio4=='') {
		$precio4=0;
	}
	if ($descripcion=='') {
		$descripcion="-";
	}
	if ($descripcion2=='') {
		$descripcion2="-";
	}
	if ($descripcion3=='') {
		$descripcion3="-";
	}
	if ($descripcion4=='') {
		$descripcion4="-";
	}
	$conexion=mysqli_connect("localhost","root","upiicsa5","corporativo_sar");
	$queU="INSERT INTO nota (folio_nota,id_servicio,id_servicio_2,id_servicio_3,id_servicio_4,cantidad,cantidad_2,cantidad_3,cantidad_4,desc_servicio,desc_servicio_2,desc_servicio_3,desc_servicio_4,precio,precio_2,precio_3,precio_4,importe,importe_2,importe_3,importe_4,subtotal,iva,riva,risr,total,nom_cliente,dom_cliente,fecha,tipo_nota) VALUES ('$folio','$idservicio','$idservicio2','$idservicio3','$idservicio4','$cantidad','$cantidad2','$cantidad3','$cantidad4','$descripcion','$descripcion2','$descripcion3','$descripcion4','$precio','$precio2','$precio3','$precio4','$importe','$importe2','$importe3','$importe4','$subtotal','$iva','$riva','$risr','$total','$nomCliente','$domCliente','$fecha','$tipoNota')";
	if ($conexion->query($queU)) {
		echo "<script>alert('DATOS GUARDADOS CORRECTAMENTE. GENERA EL PDF Y PUEDES GENERAR UNA NUEVA NOTA.');</script>";
	}
	else{
		echo "Error al actualizar los datos, verifica los datos e inténtalo de nuevo.".mysqli_error($conexion);
		header('Location: notas.php');
	}
	/*echo $queU;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styleSAR.css">
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