<div class="Service__Show row">
<h1><?= $service_name?></h1>
<p><?= $service_description?></p>

<h2 class="col-12">Agregar Recurso</h2>
<?php echo form_open('resource'); ?>
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








<table class="table">
		<thead class="thead-dark">
			<tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del Recurso</th>
      <th scope="col">Descripción</th>
      <th scope="col">Localización</th>
      <th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php if (isset($resources) && !empty($resources)): foreach ($resources as $resource): ?>
			<tr>
				<th scope="row"><?=$resource->id?></th>
				<td><?=$resource->nombre?></td>
				<td><?=$resource->descripcion?></td>
        <td><?= $resource->localizacion ?></td>
				<td> 
					<a href="<?=base_url('resource/reservation/'.$resource->id)?>" class="btn btn-info" >Reservar</a>
					<a href="<?=base_url('servicio/'.$id_service.'/recurso/editar/'.$resource->id)?>" class="btn btn-warning" >Editar</a>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#resourceModal<?=$resource->id?>" >Borrar</button>
					<!-- Modal -->
					<div class="modal fade" id="resourceModal<?=$resource->id?>" tabindex="-1" role="dialog" aria-labelledby="resourceModalLabel<?=$resource->id?>" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="resourceModalLabel<?=$resource->id?>">Borrar <?=$resource->nombre?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Esta accion borrara todas las reservas relacionadas con el recurso <?=$resource->nombre?>. Desea continuar?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-danger remove-resource" data-id=<?=$resource->id?>>Borrar</button>
						</div>
						</div>
					</div>
					</div>
				</td>
			</tr>
		<?php endforeach; endif; ?>
		
		</tbody>
	</table>
