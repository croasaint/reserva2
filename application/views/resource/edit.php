<div class="resource row">
<h2 class="col-12 pb-5">Editar Recurso</h2>
<?php echo form_open('resource/update/'.$id_service.'/'.$resource->id); ?>
<div class="form-row align-items-center">
    <div class="col-auto">
      <label for="name">Nombre</label>

      <input type="text" class="form-control mb-2" id="name" name="name" value="<?=$resource->nombre?>" placeholder="Nombre">
    </div>
    <div class="col-auto">
      <label  for="description">Descripción</label>
      <input type="text" class="form-control mb-2" id="description" name="description" value="<?=$resource->descripcion?>"  placeholder="Descripcion">
    </div>
    <div class="col-auto">
      <label  for="localization">Localización</label>
      <input type="text" class="form-control mb-2" id="localization" name="localization" value="<?=$resource->localizacion?>"  placeholder="Localizacion">
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </div>
  </div>
<?php echo form_close(); ?>
</div>
