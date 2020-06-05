<h1>Registrar Usuario</h1>
<div class="User__Show row">
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
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login"  name='login'>
  </div>

  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password"  name='password'>
  </div>

  <div class="form-group">
    <label for="login">Correo</label>
    <input type="email" class="form-control" id="correo"  name='correo'>
  </div>


<div class="form-group col-md-12">
  <p>Seleccione un servicio</p>
  <select name="id_servicio" id="id_servicio" class="form-group col-md-8" >
          <?php foreach($services->result() as $service) { ?>
                <option value="<?=$service->id?>"><?=$service->nombre?></option>
          <?php }; ?>

      </select>
      <div class="form-group ">


      <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    <?php echo form_close(); ?>
</div>
</div>
