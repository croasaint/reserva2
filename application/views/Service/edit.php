<div class="service row">
<?php echo form_open('service/update'); ?>
<div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="name">Nombre</label>
      <input type="text" class="form-control mb-2" id="name" name="name" value="<?=$service->nombre?>" placeholder="Nombre">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="description">Descripcion</label>
      <input type="text" class="form-control mb-2" id="description" name="description" value="<?=$service->descripcion?>"  placeholder="Descripcion">
    </div>
    <input type="hidden" class="form-control mb-2" id="id" name="id" value="<?=$service->id?>" >
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </div>
  </div>
<?php echo form_close(); ?>
</div>
