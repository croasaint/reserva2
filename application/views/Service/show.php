<div class="Service__Show row">
<h1><?= $service_name?></h1>
<p><?= $service_description?></p>

<?php if($recursos){?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nombre del Recurso</th>
      <th scope="col">Descripción</th>
      <th scope="col">Localización</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    foreach ($recursos as $recurso){
      ?>

      <th scope='row'><?= $recurso->nombre ?></a></td>
      <td><?= $recurso->descripcion ?></td>
      <td><?= $recurso->localizacion ?></td>
      <td><a href="<?=base_url('resource/reservation/'.$recurso->id);?>"> <button class="btn btn-primary">Reservar</button> </a></td></tr></tbody></td>

<?php } }else{} ?>
</tr></tbody>
</table>
<h2 class="col-12">Agregar Recurso</h2>
<?php echo form_open('Service/recieveData_R'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="descripcion">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name='descripcion'>
    </div>
  </div>
  <div class="form-group">
    <label for="localizacion">Localización</label>
    <input type="text" class="form-control" id="localizacion"  name='localizacion'>
  </div>
  <div class="form-group">
    <label for="id_servicio"></label>
    <input type="hidden" class="form-control" id="id_servicio" name='id_servicio' value='<?= $id_service  ?>'>
  </div>

  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
<?php echo form_close(); ?>
