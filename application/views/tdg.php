<?php if (isset($tdg)) { ?>
	<?php foreach ($tdg as $key) { ?>
		<tr>
			<td class="column1"><?php echo $key->tdg; ?></td>
			<td class="column2"><?php echo $key->alumno; ?></td>
			<td class="column3"><?php echo $key->tutor; ?></td>
			<td class="column4"><?php echo $key->fecha; ?></td>
			<td class="column5">
				<a href="ver?r=<?php echo base64_encode($key->url); ?>&t=<?php echo $key->tdg; ?>" target="_blank" type="button" class="btn btn-primary">Descargar PDF</a>
			</td>
		</tr>
	<?php } ?>
<?php } else { ?>
	<tr>
		<td colspan="5" class="column1" style="text-align: center; width: 100%; padding: 10px; font-weight: bold;">No hay resultados</td>
	</tr>
<?php } ?>