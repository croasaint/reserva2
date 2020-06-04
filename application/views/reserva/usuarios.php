<h1>Usuarios Registrados</h1>
<?php if($usuarios){?>
<table border solid black 2px>
  <thead>
      <th>Nombre </a></th>
      <th>Apellido</th>
      <th>login</th>
      <th>rol</th>
      <th>Correo</th>
  </thead>
  <tbody>
<?php

foreach ($usuarios->result() as $user){
  ?>

      <?php echo
      "<td>"."<a href='$user->id'>".$user->nombre."</a></td>".
      "<td>".$user->apellido."</td>".
      "<td>".$user->username."</td>".
      "<td>".$user->rol."</td>".
      "<td>".$user->email."</td></tbody>"; ?>

<?php } }else {
  echo "Error en la aplicacion";
} ?>
</table>
</body>
</html>
