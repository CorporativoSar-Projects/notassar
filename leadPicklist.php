<select name="<?php echo 'leadPicklist'.$valor[id_p]; ?>" id="<?php echo 'leadPicklist'.$valor[id_p]; ?>" onchange="changeLeadColor(this);">
	<option value="nuevo">Nuevo</option>
	<option value="primCotacto">Primer contacto</option>
	<option value="proceso">En proceso</option>
	<option value="calificado">Calificado</option>
	<option value="noCalificado">No califica</option>
</select>