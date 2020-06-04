<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>prueba</title>
  </head>
  <body>
    <h1>llamado desde el controlador</h1>

    <?php foreach ($usuarios->result() as $usuario){?>
      <ul>
        <li><?=  $usuario->nombre; ?></li>
      </ul>

    <?php  } ?>


    <?php echo $mi_menu;?>


  </body>
</html>
