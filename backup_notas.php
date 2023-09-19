			<div id="divContTable">vvhhjhjvjvhvjv
			<table id="contTable">
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