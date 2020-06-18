<div class="service row">
<h2 class="col-12 mb-4">Agregar Servicios</h2>
	<?php echo form_open('service'); ?>
		<div class="form-row align-items-center mb-4">
			<div class="col-auto">
				<label class="sr-only" for="name">Nombre</label>
				<input type="text" class="form-control mb-2" id="name" name="name" required placeholder="Nombre">
			</div>
			<div class="col-auto">
				<label class="sr-only" for="description">Descripcion</label>
				<input type="text" class="form-control mb-2" id="description" name="description" required placeholder="Descripcion">
			</div>

			<div class="col-auto ">
				<button type="submit" class="btn btn-primary mb-2">Agregar</button>
			</div>
		</div>
	<?php echo form_close(); ?>
	<table class="table table-responsive">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripcion</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php if (isset($services) && !empty($services)): foreach ($services as $service): ?>
			<tr>
				<th scope="row"><?=$service->id?></th>
				<td><?=$service->nombre?></td>
				<td><?=$service->descripcion?></td>
				<td>
					<a href="<?=base_url('servicio/'.$service->id.'/recursos')?>" class="btn btn-info" >Ver recursos</a>
					<a href="<?=base_url('servicio/editar/'.$service->id)?>" class="btn btn-warning" >Editar</a>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#serviceModal<?=$service->id?>" >Borrar</button>
					<!-- Modal -->
					<div class="modal fade" id="serviceModal<?=$service->id?>" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel<?=$service->id?>" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="serviceModalLabel<?=$service->id?>">Borrar <?=$service->nombre?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Esta accion borrara todos los recursos relacionados con el servicio <?=$service->nombre?>. Desea continuar?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-danger remove-service" data-id=<?=$service->id?>>Borrar</button>
						</div>
						</div>
					</div>
					</div>
				</td>
			</tr>
		<?php endforeach; endif; ?>

		</tbody>
	</table>

</div>
