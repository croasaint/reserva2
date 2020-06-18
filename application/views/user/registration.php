
<div class="User row">
  <h1 class="col-12 pb-3">Registrar Usuario</h1>
<?php echo form_open('Service/insertUser'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" name='apellido'>
    </div>
  </div>
  <div class="form-group">
    <label for="login">Nombre de usuario</label>
    <input type="text" class="form-control" id="username"  name='username'>
  </div>

  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password"  name='password'>
  </div>

  <div class="form-group">
    <label for="login">Correo</label>
    <input type="email" class="form-control" id="correo"  name='correo'>
  </div>

<div class="form-group">
  <input type="hidden" name="rol" value="2">
</div>
<div class="form-group col-md-12">
  <p>Seleccione un servicio</p>
  <select name="id_servicio" id="id_servicio" class="form-group col-md-8" >
    <?php if(isset($services)){ ?>
          <?php foreach($services as $service) { ?>
                <option value="<?= $service->id?>"><?= $service->nombre?></option>
          <?php }}; ?>

      </select>
      <div class="form-group ">


      <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    <?php echo form_close(); ?>
</div>
</div>
