<div class="service">
	<div class="jumbotron">
        <div class="container">
          <h1 class="display-5">Servicios</h1>
		  <p>A continuacionn se listan los servicios disponibles del sistema cabildo</p>
		  <?php if($rol=='admin'):?>
			<p><a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal" href="#" role="button">agregar servicio</a></p>
		  <?php endif; ?>          
        </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<?php if($rol=='admin'):?>
								<th></th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($services) && !empty($services)): foreach ($services as $service): ?>
							<tr>
								<th><?=$service->id?></th>
								<td><?=$service->nombre?></td>
								<td><?=$service->descripcion?></td>
								<?php if($rol=='admin'):?>
									<td>					
										<a href="<?=base_url('servicio/'.$service->id.'/recursos')?>" class="btn" ><i class="fas fa-eye"></i></a>
										<a href="" class="btn " data-toggle="modal" data-target="#service-edit-modal<?=$service->id?>"  ><i class="fas fa-pen"></i></a>
										<a href="" class="btn" data-toggle="modal" data-target="#service-remove-modal<?=$service->id?>" ><i class="fas fa-trash"></i></a>
										<!-- Inicio ------------------  Modal Borrar Servicio -------------------------->
										<div class="modal fade" id="service-remove-modal<?=$service->id?>" tabindex="-1" role="dialog" aria-labelledby="service-remove-modalLabel<?=$service->id?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="service-remove-modalLabel<?=$service->id?>">Borrar <?=$service->nombre?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Esta accion borrara todos los recursos y usuarios relacionados con el servicio <strong><?=$service->nombre?></strong>. Desea continuar?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<button type="button" class="btn btn-danger remove-service" data-id=<?=$service->id?>>Borrar</button>
												</div>
												</div>
											</div>
										</div>
										<!-- Fin ------------------  Modal Borrar Servicio -------------------------->

										<!-- Inicio ------------------  Modal Editar Servicio -------------------------->
										<div class="modal fade" id="service-edit-modal<?=$service->id?>" tabindex="-1" role="dialog" aria-labelledby="service-edit-modalLabel<?=$service->id?>" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="service-edit-modalLabel<?=$service->id?>">Editar Servicio</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<?php echo form_open('service/'.$service->id); ?>
														<div class="form-group">
															<label for="name">Nombre</label>
															<input type="text" class="form-control" id="name" name="name" value="<?=$service->nombre?>" required>
														</div>
														<div class="form-group">
															<label for="description">Descripción</label>
															<input type="text" class="form-control" id="description" name='description'  value="<?=$service->descripcion?>"  required>
														</div>
												
														
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
															<button type="submit" class="btn btn-primary">Actualizar</button>
														</div>
														<?php echo form_close(); ?>
													</div>				
												</div>
											</div>
										</div>
										<!-- Fin ------------------  Modal Editar Servicio -------------------------->
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	

	<!-- Inicio ------------------  Modal Agregar servicio -------------------------->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('service'); ?>
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="form-group">
						<label for="description">Descripción</label>
						<input type="text" class="form-control" id="description" name='description' required>
					</div>
			
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>
					<?php echo form_close(); ?>
				</div>				
			</div>
		</div>
	</div>
	<!-- Fin ------------------  Modal Agregar servicio -------------------------->
</div>
