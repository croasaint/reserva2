<div class="authorization row">
<?= form_open(
      'signup/',
      array('style'  => 'width: 100%;max-width: 630px; padding: 15px;margin: auto;')
  ); ?>    
      <h1 class="h3 mb-2 font-weight-normal">Registro de Usuarios</h1>
      
      <label for="name" class="sr-only">Nombre</label>
      <input type="text" class="form-control mb-2" id="name" name="name"  placeholder="Nombre" required autofocus="">

      <label for="lastname" class="sr-only">Apellido</label>
      <input type="text" class="form-control mb-2" id="lastname" name="lastname"  placeholder="Apellido" required autofocus="">

      <label for="email" class="sr-only">Correo electronico</label>
      <input type="email" class="form-control mb-2" id="email" name="email"  placeholder="Correo electronico" required autofocus="">
      
      <label for="username" class="sr-only">Nombre de usuario</label>
      <input type="text" class="form-control mb-2" id="username" name="username"  placeholder="Nombre de usuario" required autofocus="">

      <div class="form-group">
        <label class="sr-only" for="id_service">Servicio de interes</label>
        <select class="form-control" id="id_service" name="id_service" required>
        
            <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                <option value="<?=$service->id?>"><?=$service->nombre?></option>
            <?php endforeach; endif; ?>
        </select>
      </div>

      <label for="password" class="sr-only">Contraseña</label>
      <input type="password" id="password" class="form-control mb-2" name="password" placeholder="Contraseña" required>

      <label for="c-password" class="sr-only">Confirmar contraseña</label>
      <input type="password" id="c-password" class="form-control mb-2" name="c-password" placeholder="Confirmar contraseña" required>
                
   
      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
    
  <?=form_close(); ?>

</div>
