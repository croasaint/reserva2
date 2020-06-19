<div class="authorization row">
    <?php echo form_open('signin/'); ?>
    <div class="form-row align-items-center">
        <div class="col-12">
        <label class="sr-only" for="username">Nombre de usuario</label>
        <input type="text" class="form-control mb-2" id="username" name="username"  placeholder="Nombre de usuario">
        </div>
        <div class="col-12">
        <label class="sr-only" for="password">Contraseña</label>
        <input type="password" class="form-control mb-2" id="password" name="password"   placeholder="Contraseña">
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary mb-2">Iniciar sesion</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>