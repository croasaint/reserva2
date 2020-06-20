<div class="authorization row">
  <h1 class="col-12 pb-4">Registro de Usuarios</h1>
    <?php echo form_open('signup/'); ?>
    <div class="form-row align-items-center">
        <div class="col-12">
            <label class="sr-only" for="name">Nombre</label>
            <input type="text" class="form-control mb-2" id="name" name="name"  placeholder="Nombre" required>
        </div>
        <div class="col-12">
            <label class="sr-only" for="lastname">Apellido</label>
            <input type="text" class="form-control mb-2" id="lastname" name="lastname"  placeholder="Apellido" required>
        </div>
        <div class="col-12">
            <label class="sr-only" for="email">Correo electronico</label>
            <input type="email" class="form-control mb-2" id="email" name="email"  placeholder="Correo electronico" required>
        </div>
        <div class="col-12">
        <label class="sr-only" for="username">Nombre de usuario</label>
        <input type="text" class="form-control mb-2" id="username" name="username"  placeholder="Nombre de usuario" required>
        </div>
        <div class="col-12">
        <div class="form-group">
            <label class="sr-only"  for="id_service">Servicio de interes</label>
            <select class="form-control" id="id_service" name="id_service">
            <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                <option value="<?=$service->id?>"><?=$service->nombre?></option>
            <?php endforeach; endif; ?>
            </select>
        </div>
        </div>
        <div class="col-12">
        <label class="sr-only" for="password">Contraseña</label>
        <input type="password" class="form-control mb-2" id="password" name="password"   placeholder="Contraseña" required>
        </div>
        <div class="col-12">
        <label class="sr-only" for="c-password">Confirmar contraseña</label>
        <input type="password" class="form-control mb-2" id="c-password" name="c-password"   placeholder="Confirmar contraseña" required>
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary mb-2">Registrar</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
