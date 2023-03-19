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
	global $contLeads;
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
	<title>Prospeccion SAR</title>
</head>
<style>	
	#leadsTable td{
		border: 1px solid black !important;
	}
	#leadsTable{
		border: 0px solid black;
		font-size: 12px;
		width: 100% !important;
	}
</style>
<body onload="changeLabels();">
	<?php include 'menu.php'; ?>
	<?php include 'menuAcciones.php'; ?>
		<table id="leadsTable">
			<tr>
				<td colspan="13" style="border: 0px !important"><h3><br>Base de datos de prospección<br><br></h3></td>
			</tr>
			<tr>
				<td colspan="3" style="border: 0px !important">
					<div align="left">
						<?php
							$queryCL="SELECT * FROM prospecto";
							$prospectoCL=$conexion->query($queryCL);
							$contLeadCL=mysqli_affected_rows($conexion);
							$contMyLeadCL=0;						
							while ($valor=mysqli_fetch_array($prospectoCL))
							{
								if ($valor[nom_usuario]==$varsesion) {
									$contMyLeadCL++;
								}
							}
						?>
					<h6 style="color:;">Total de leads del equipo: <b><?php echo $contLeadCL; ?></b></h6>
					<h6 style="color: red;">Mis leads: <b><?php echo $contMyLeadCL; ?></b></h6><br>
					</div>
				</td>
			</tr>
			<tr>
				<?php
					$cabecera = array('ID','NOMBRE','DOMICILIO','INDUSTRIA','TELÉFONO','CORREO','REPRESENTANTE','ORIGEN','SERVICIO(S)','ESTATUS','AGENTE');
					foreach ($cabecera as $fila)
					{
						echo "<td><b>".$fila."</b></td>";
					}
				?>			
			</tr>			
			<?php
				$query="SELECT * FROM prospecto";
				$prospecto=$conexion->query($query);
				$contLeads=mysqli_affected_rows($conexion);	
				while ($valor=mysqli_fetch_array($prospecto))
				{
					if ($valor[nom_usuario]==$varsesion)
					{
						echo "<tr id='leadRowleadPicklist".$valor[id_p]."'><td>".$valor[id_p]."
							</td><td>".$valor[nom_prospecto]."
							</td><td>".$valor[dom_prospecto]."							
							</td><td>".$valor[giro]."
							</td><td>".$valor[tel_prospecto]."
							</td><td>".$valor[correo_prospecto]."
							</td><td>".$valor[representante]."
							</td><td>".$valor[origen]."
							</td><td>".$valor[servicio_interes]."
							</td><td>";include 'leadPicklist.php';echo "
							</td><td>".$valor[agente]."
							</td></tr>";
						echo "<script>var a=document.getElementById('leadPicklist".$valor[id_p]."').value;
						b=document.getElementById('leadRowleadPicklist".$valor[id_p]."');
						if(a=='nuevo' || a=='primCotacto'){
							b.style.backgroundColor='#ECECEC';
						}
						else if(a=='proceso'){
							b.style.backgroundColor='#FFE779';
						}
						else if(a=='calificado'){
							b.style.backgroundColor='#96FF8E';
						}
						else if(a=='noCalificado'){
							b.style.backgroundColor='#FFA8A8';
						}</script>";
					}
				}
			?>
		</table>
	</div>
</body>
<script>
	function changeLeadColor(argument) {
		var a=argument.value;
		var idlead=argument.id;
		var b=document.getElementById('leadRow'+idlead);
		//var b=table.getElementByTagName("tr");
		if(a=='nuevo' || a=='primCotacto'){
			b.style.backgroundColor='#ECECEC';
		}
		else if(a=='proceso'){
			b.style.backgroundColor='#FFE779';
		}
		else if(a=='calificado'){
			b.style.backgroundColor='#96FF8E';
		}
		else if(a=='noCalificado'){
			b.style.backgroundColor='#FFA8A8';
		}
	}
	function verAdd() {
		window.open("addProspect.php", "ventanaEmergente", "width=700,height=500,resizable=no");
	}

	function verConsulta() {
		window.open("searchProspect.php", "ventanaEmergente", "width=700,height=500,resizable=no");
	}

	function changeLabels() {
		document.getElementById('labelAñadir').innerHTML="Añadir prospecto";
		document.getElementById('labelEliminar').innerHTML="Editar prospecto";
		document.getElementById('labelConsultar').innerHTML="Buscar prospectos";
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