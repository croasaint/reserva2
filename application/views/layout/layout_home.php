
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php if (isset($css) && !empty($css)): foreach ($css as $file): ?>
			<link href="<?php echo get_cached_filename('/assets/css/' . $file . '.css'); ?>" rel="stylesheet" />
	  <?php endforeach; endif; ?>

    <title>Sistema Cabildo</title>

    <style media="screen">
      .dropdown-menu.show{
        max-height: 200px;
        overflow-y: scroll;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Cabildo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Calendario <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('servicios/')?>">Servicios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php
           if(isset($services)){

          foreach ($services as $service){
            ?>
            <a class='dropdown-item' href="<?=base_url('servicio/'.$service->id.'/recursos')?>">


              <?=$service->nombre?>
            </a>

          <?php } }else {
            echo "Error en la aplicacion";
          } ?>
          <a class="dropdown-item" href="<?= "service/add "?>">Añadir Servicio</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Iniciar Sesion</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?='user/registration'?>">Registrase</a>
      </li>
    </ul>
  </div>


</nav>

<div class="content container p-5">
    <?php if(isset($content)){ echo $content;} ?>
</div>

    <?php if(isset($js) && !empty($js)): foreach($js as $file): ?>
    <script type="text/javascript" src="<?php echo get_cached_filename('assets/js/'.$file.'.js'); ?>"></script>
    <?php endforeach; endif; ?>

  </body>
</html>
