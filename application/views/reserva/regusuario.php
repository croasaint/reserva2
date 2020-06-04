<h2>Formulario de los usuarios</h2>

<?php echo form_open('/reserva/recibirdatos'); ?>
<?php
$nombre = array(
  'name' => 'nombre',
  'placeholder' => 'Escribe tu nombre'
);

$apellido = array(
  'name' => 'apellido',
  'placeholder' => 'Escribe tu apellido'
);

$username = array(
  'name' => 'username',
  'placeholder' => 'Escribe tu usuario'
);

$password = array(
  'name' => 'password',
  'type' => 'password',
  'placeholder' => 'Escribe tu contraseña'
);

$email = array(
  'name' => 'email',
  'type' => 'email',
  'placeholder' => 'Escribe tu correo'
);

$rol = array(
  'name' => 'rol',
  'placeholder' => 'Ingresa tú rol'
);
 ?>


<?= form_label('Nombre : ', 'nombre')  ?>
  <?= form_input($nombre)?>
<br>
<br>

  <?= form_label('Apellido : ', 'apellido')  ?>
    <?= form_input($apellido)?>
<br>
<br>
    <?= form_label('Usuario : ', 'username')  ?>
      <?= form_input($username)?>
<br>
<br>
      <?= form_label('Password : ', 'password')  ?>
        <?= form_input($password)?>
<br>
<br>
        <?= form_label('email : ', 'email')  ?>
          <?= form_input($email)?>
<br>
<br>
          <?= form_label('Rol : ', 'rol')  ?>
            <?= form_input($rol)?>
<br><br>

<?= form_submit('', 'Enviar') ?>
<?php echo form_close(); ?>
  </body>
</html>
