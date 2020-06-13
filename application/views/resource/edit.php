<div class="resource row">

<?php echo form_open('resource/update/'.$id_service.'/'.$resource->id); ?>
<div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="name">Nombre</label>
      <input type="text" class="form-control mb-2" id="name" name="name" value="<?=$resource->nombre?>" placeholder="Nombre">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="description">Descripcion</label>
      <input type="text" class="form-control mb-2" id="description" name="description" value="<?=$resource->descripcion?>"  placeholder="Descripcion">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="localization">Localizacion</label>
      <input type="text" class="form-control mb-2" id="localization" name="localization" value="<?=$resource->localizacion?>"  placeholder="Localizacion">
    </div>
  
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </div>
  </div>
<?php echo form_close(); ?>
</div>
