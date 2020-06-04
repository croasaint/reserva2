<h1>Formulario Recurso</h1>

<?php echo form_open('/reserva/recibirdatosrecurso'); ?>
<?php
$nombre = array(
  'name' => 'nombre',
  'placeholder' => 'Escribe el nombre del recurso'
);

$descripcion = array(
  'name' => 'descripcion',
  'placeholder' => 'Escribe una descripcion'
);

$localizacion = array(
  'name' => 'localizacion',
  'placeholder' => 'Escribe una localidad'
);


?>

<?= form_label('Nombre : ', 'nombre')  ?>
  <?= form_input($nombre)?>
<br>
<br>

  <?= form_label('Descripcion : ', 'descripcion')  ?>
    <?= form_input($descripcion)?>
<br>
<br>
    <?= form_label('Localidad : ', 'localizacion')  ?>
      <?= form_input($localizacion)?>
<br>
<br>

<?= form_submit('', 'Enviar') ?>
<?php echo form_close(); ?>
  </body>
</html>
