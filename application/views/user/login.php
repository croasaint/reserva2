<div class="User__Show row">
  <h1 class="col-12">Iniciar sesion</h1>
  <?php echo form_open('Signin/loginUser'); ?>
  <form class="form-inline">
    <div class="form-group ">
      <label for="username" class="sr-only">Usuario</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Ingrese su Usuario: pablo">
    </div>
    <div class="form-group">
      <label for="password" class="sr-only">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password: 123456">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  <?php echo form_close(); ?>
</form>
</div>
