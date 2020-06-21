<div class="user">
	<div class="jumbotron">
        <div class="container">
          <h1 class="display-5">Usuarios</h1>
		  <p>A continuacionn se listan los Usuarios Activos del sistema cabildo</p>
		  <?php if($rol=='admin'):?>
			<p><a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal" href="#" role="button">Nuevo usuario</a></p>
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
							<th>Apellido</th>
                            <th>Username</th>
                            <th>Email</th>
							
							<th></th>
						
						</tr>
					</thead>
					<tbody>
						<?php if (isset($users) && !empty($users)): foreach ($users as $user): ?>
							<tr>
								<th><?=$user->id?></th>
								<td><?=$user->nombre?></td>
								<td><?=$user->apellido?></td>
                                <td><?=$user->username?></td>
                                <td><?=$user->email?></td>
			
									<td>					
										<a href="" class="btn " data-toggle="modal" data-target="#user-edit-modal<?=$user->id?>"  ><i class="fas fa-pen"></i></a>
										<a href="" class="btn" data-toggle="modal" data-target="#user-remove-modal<?=$user->id?>" ><i class="fas fa-trash"></i></a>
										<!-- Inicio ------------------  Modal Borrar Usuario -------------------------->
										<div class="modal fade" id="user-remove-modal<?=$user->id?>" tabindex="-1" role="dialog" aria-labelledby="user-remove-modalLabel<?=$user->id?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="user-remove-modalLabel<?=$user->id?>">Borrar <?=$user->nombre?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Esta accion borrara el usuario <strong><?=$user->nombre?></strong> y sus reservas. Desea continuar?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<button type="button" class="btn btn-danger remove-user" data-id=<?=$user->id?>>Borrar</button>
												</div>
												</div>
											</div>
										</div>
										<!-- Fin ------------------  Modal Borrar Usuario -------------------------->

										<!-- Inicio ------------------  Modal Editar Usuario -------------------------->
										<div class="modal fade" id="user-edit-modal<?=$user->id?>" tabindex="-1" role="dialog" aria-labelledby="user-edit-modalLabel<?=$user->id?>" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="user-edit-modalLabel<?=$user->id?>">Editar Usuario</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo form_open('user/'.$user->id); ?>
                                                            <div class="form-group">
                                                                <label for="name">Nombre</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="<?=$user->nombre?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname">Apellido</label>
                                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->apellido?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Nombre Usuario</label>
                                                                <input type="text" class="form-control" id="username" name="username" value="<?=$user->username?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?=$user->email?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="sr-only" for="id_service">Servicio de interes</label>
                                                                <select class="form-control" id="id_service" name="id_service" value="<?=$user->id_service?>" required>
                                                                
                                                                    <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                                                                        <option value="<?=$service->id?>"><?=$service->nombre?></option>
                                                                    <?php endforeach; endif; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="sr-only" for="rol">Rol de usuario</label>
                                                                <select class="form-control" id="rol" name="rol" value="<?=$user->rol?>" required>                                   
                                                                    <option value="2"> Miembro</option>
                                                                    <option value="1">Administrador</option>                          
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password">Contraseña</label>
                                                                <input type="password" class="form-control" id="password" name="password" required>
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
										<!-- Fin ------------------  Modal Editar Usuario -------------------------->
									</td>
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
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('user/'); ?>
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
                    <div class="form-group">
						<label for="lastname">Apellido</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required>
					</div>
                    <div class="form-group">
						<label for="username">Nombre Usuario</label>
						<input type="text" class="form-control" id="username" name="username" required>
					</div>
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>

                    <div class="form-group">
                        <label class="sr-only" for="id_service">Servicio de interes</label>
                        <select class="form-control" id="id_service" name="id_service" required>
                        
                            <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                                <option value="<?=$service->id?>"><?=$service->nombre?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="rol">Rol de usuario</label>
                        <select class="form-control" id="rol" name="rol" required>                                   
                            <option value="2"> Miembro</option>
                            <option value="1">Administrador</option>                          
                        </select>
                    </div>

                    <div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" class="form-control" id="password" name="password" required>
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