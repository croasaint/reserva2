<div class="authorization row">
  <?= form_open(
      'signin/',
      array('style'  => 'width: 100%;max-width: 330px; padding: 15px;margin: auto;')
  ); ?>    
      <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
      <label for="username" class="sr-only">Nombre de usuario</label>
      <input type="text" class="form-control" id="username" name="username"  placeholder="Nombre de usuario"required="" autofocus="">
      <label for="password" class="sr-only">Contraseña</label>
      <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesion</button>
    
  <?=form_close(); ?>
</div>
