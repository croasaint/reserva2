
<?php echo form_open('Service/recieveData'); ?>
<?php
$nombre = array(
  'name' => 'service_name',
);
$descripcion = array(
  'name' => 'service_description',
);
 ?>
 <h2>Agregar Servicios</h1>
   <br>
   <br>
 <div class="service__create row">
   <div class="form-row">
<div class="form-group col-md-5">
<?= form_label('Nombre : ', 'service_name')  ?>
  <?= form_input($nombre)?>
</div>

<div class="form-group col-md-6">
  <?= form_label('Descripcion : ', 'service_description')  ?>
    <?= form_input($descripcion)?>
</div>
</div>
<button class="btn btn-primary" ><?= form_submit('', 'Enviar') ?></button>
<?php echo form_close(); ?>
</div>
