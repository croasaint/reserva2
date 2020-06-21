<div class="Service__Show">
	<div class="jumbotron">
        <div class="container">
          <h1 class="display-5"><?= $service_name?></h1>
		  <p><?= $service_description?></p>
		  <?php if($rol=='admin'):?>
			<p><a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal" href="#" role="button">agregar recurso</a></p>
		  <?php endif; ?>          
        </div>
	</div>
	<div class="container ">
		<div class="row">
			<div class="col-12 ">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>						
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Localización</th>
							<?php if($rol!='visitor'):?>
								<th></th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($resources) && !empty($resources)): foreach ($resources as $resource): ?>
							<tr>								
								<td><?=$resource->nombre?></td>
								<td><?=$resource->descripcion?></td>
								<td><?= $resource->localizacion ?></td>
								<?php if($rol!='visitor'):?>
									<td>					
										<a href="<?=base_url('/servicio/recurso/reservacion/'.$resource->id)?>" class="btn" ><i class="fas fa-calendar-day"></i></a>
										<?php if($rol=='admin'):?>
											<a href="" class="btn " data-toggle="modal" data-target="#resource-edit-modal<?=$resource->id?>"  ><i class="fas fa-pen"></i></a>
											<a href="" class="btn" data-toggle="modal" data-target="#resource-remove-modal<?=$resource->id?>" ><i class="fas fa-trash"></i></a>

											<!-- Inicio ------------------  Modal Borrar Recurso -------------------------->
											<div class="modal fade" id="resource-remove-modal<?=$resource->id?>" tabindex="-1" role="dialog" aria-labelledby="resource-remove-modalLabel<?=$resource->id?>" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="resource-remove-modalLabel<?=$resource->id?>">Borrar <?=$resource->nombre?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Esta accion borrara todas las reservas relacionadas con el recurso <strong><?=$resource->nombre?></strong>. Desea continuar?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
														<button type="button" class="btn btn-danger remove-resource" data-id=<?=$resource->id?>>Borrar</button>
													</div>
													</div>
												</div>
											</div>
											<!-- Fin ------------------  Modal Borrar Recurso -------------------------->

											<!-- Inicio ------------------  Modal Editar Servicio -------------------------->
											<div class="modal fade" id="resource-edit-modal<?=$resource->id?>" tabindex="-1" role="dialog" aria-labelledby="resource-edit-modalLabel<?=$resource->id?>" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="resource-edit-modalLabel<?=$resource->id?>">Editar Recurso</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<?php echo form_open('resource/update/'.$id_service.'/'.$resource->id); ?>
															<div class="form-group">
																<label for="name">Nombre</label>
																<input type="text" class="form-control" id="name" name="name" value="<?=$resource->nombre?>" required>
															</div>
															<div class="form-group">
																<label for="description">Descripción</label>
																<input type="text" class="form-control" id="description" name='description'  value="<?=$resource->descripcion?>"  required>
															</div>

															<div class="form-group">
																<label for="localization">Localización</label>
																<input type="text" class="form-control" id="localization" name='localization'  value="<?=$resource->localizacion?>"  required>
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
										<?php endif; ?>									
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; endif; ?>
					</tbody>
				</table>								
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Recurso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('resource'); ?>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripción</label>
						<input type="text" class="form-control" id="descripcion" name='descripcion' required>
					</div>
					<div class="form-group">
						<label for="localizacion">Localización</label>
						<input type="text" class="form-control" id="localizacion"  name='localizacion' required>
					</div>
					<input type="hidden" class="form-control" id="id_servicio" name='id_servicio' value='<?= $id_service  ?>'>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>
					<?php echo form_close(); ?>
				</div>				
			</div>
		</div>
	</div>
</div>