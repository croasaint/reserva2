<div class="Service__Show row">

<?php echo form_open('Service/recieveData_R');
?>
<?php
$id_servicio = array(
  'name' => 'id_service',

);

$nombre = array(
  'name' => 'resource_name',
);
$descripcion = array(
  'name' => 'resource_description',
);

$localizacion = array(
  'name' => 'resource_local'
)
 ?>
 <h2>Agregar Recurso</h1>
   <br>
   <br>
 <div class="Service__Create row">
   <div class="form-row">
<div class="form-group col-md-5">
<?= form_label('Nombre : ', 'resource_name')  ?>
  <?= form_input($nombre)?>
</div>

<div class="form-group col-md-6">
  <?= form_label('Descripcion : ', 'resource_description')  ?>
    <?= form_input($descripcion)?>
</div>

<div class="form-group col-md-6">
  <?= form_label('Localización : ', 'resource_local')  ?>
    <?= form_input($localizacion)?>
</div>

<div class="form-group col-md-6">
  <select name="id_service">


      </select>

</div>





</div>
<button class="btn btn-primary" ><?= form_submit('', 'Enviar') ?></button>
<?php echo form_close(); ?>
</div>
</div>
