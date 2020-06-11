<div class="service row">
<h2>Agregar Servicios</h2>
	<?php echo form_open('service/store'); ?>
		<div class="form-row align-items-center">
			<div class="col-auto">
				<label class="sr-only" for="name">Nombre</label>
				<input type="text" class="form-control mb-2" id="name" name="name" required placeholder="Nombre">
			</div>
			<div class="col-auto">
				<label class="sr-only" for="description">Descripcion</label>
				<input type="text" class="form-control mb-2" id="description" name="description" required placeholder="Descripcion">
			</div>
			
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-2">Agregar</button>
			</div>
		</div>
	<?php echo form_close(); ?>
	<table class="table">
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
					<button type="button" class="btn btn-danger">Borrar</button>
				</td>
			</tr>
		<?php endforeach; endif; ?>
		
		</tbody>
	</table>
	
</div>
