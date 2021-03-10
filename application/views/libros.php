<?php $contacp = 0 ?>

<?php if($libros) { ?>
	<?php foreach ($libros as $key) { ?>
		<?php if ($key->aceptado == 1) { $contacp++; ?>
			<tr>
				<td class="column1"><?php echo $key->libro; ?></td>
				<td class="column2"><?php echo $key->autor; ?></td>
				<td class="column3"><?php echo $key->editorial; ?></td>
				<td class="column4"><?php echo $key->publicacion; ?></td>
				<td class="column5">Semestre <?php echo $key->cod_semestre; ?></td>
				<td class="column6"><?php echo $key->materia; ?></td>
				<td class="column7">
					<a href="<?php echo $key->url; ?>" target="_blank" type="button" class="btn btn-primary">Descargar PDF</a>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>

	<?php if ($contacp == 0) { ?>
		<td colspan="7" class="column1" style="text-align: center; width: 100%; padding: 10px; font-weight: bold;">No hay resultados</td>
	<?php } ?>
<?php } else { ?>
	<td colspan="7" class="column1" style="text-align: center; width: 100%; padding: 10px; font-weight: bold;">No hay resultados</td>
<?php } ?>