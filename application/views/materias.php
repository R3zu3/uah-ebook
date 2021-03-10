<option value="0">Seleccione la materia</option>

<?php if (isset($materias)) { ?>
	<?php foreach ($materias as $key) { ?>
		<option value="<?php echo $key->cod_materia; ?>">
			<?php echo $key->materia; ?>
		</option>
	<?php } ?>
<?php } ?>
