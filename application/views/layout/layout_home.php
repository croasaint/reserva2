
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php if (isset($css) && !empty($css)): foreach ($css as $file): ?>
			<link href="<?php echo get_cached_filename('/assets/css/' . $file . '.css'); ?>" rel="stylesheet" />
	  <?php endforeach; endif; ?>

    <title>Hello, world!</title>

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
    <ul class="navbar-nav flex-row w-100 ">
      <li class="nav-item active ">
        <a class="nav-link" href="<?= base_url(''); ?>">Principal <span class="sr-only">(current)</span></a>
      </li>

<?php if($this->session->userdata('rol') == '1'):?>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Servicios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php


             if(isset($services)){

            foreach ($services->result() as $service){
              ?>
              <a class='dropdown-item' href="<?=base_url('service/show/'.$service->id)?>">


                <?=$service->nombre?>
              </a>

            <?php } }else {
              echo "Error en la aplicacion";
            } ?>
            <a class="dropdown-item" href="<?= base_url("service/add ");?>">Añadir Servicio</a>
          </div>
        </li>
        <li class="nav-item ml-auto">
          <a class="nav-link"><?php echo $this->session->userdata('username'); ?></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?= base_url('user/destroy');?>">Cerrar Sesión</a>
        </li>
<?php elseif ($this->session->userdata('rol') == '2'):?>

  <li class="nav-item">
    <?php  if(isset($userService)){

      foreach ($userService->result() as $usersr){
    ?>
    <a class="nav-link " href="<?=base_url('service/show/'.$usersr->id_servicio)?>"><?= $usersr->nombre ?></a>
  </li>
<?php
}}
else{ echo 'error';}
  ?>
  <li class="nav-item ml-auto">
    <a class="nav-link"><?php echo $this->session->userdata('username'); ?></a>
  </li>


  <li class="nav-item ">
    <a class="nav-link" href="<?= base_url('user/destroy');?>">Cerrar Sesión</a>
  </li>



<?php else: ?>

      <li class="nav-item ml-auto">

        <a class="nav-link  " href="<?= base_url('user/login');?>">Iniciar Sesión</a>

      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/registration');?>">Registrarse</a>
      </li>

  <?php endif; ?>
    </ul>
  </div>


</nav>


<div class="content container p-5">
    <?php if(isset($content)){ echo $content;} ?>

    <?php if(isset($reservas)){?>

  <h2 class="col-md-12">Reservas realizadas</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre del Recurso</th>
          <th scope="col">Localidad</th>
          <th scope="col">Usuario</th>
          <th scope="col">Fecha de Inicio</th>
          <th scope="col">Fecha Fin</th>

        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($reservas->result() as $reserva){
          ?>

          <th scope='row'><?= $reserva->nombrer ?></td>
          <td><?= $reserva->localizacion ?></td>
          <td><?= $reserva->usuario ?></td>
          <td><?= $reserva->fecha_inicio ?></td>
          <td><?= $reserva->fecha_fin?></td>
          </tr></tbody></td>

    <?php } }else{} ?>
    </tr></tbody>
    </table>

</div>

    <?php if(isset($js) && !empty($js)): foreach($js as $file): ?>
    <script type="text/javascript" src="<?php echo get_cached_filename('assets/js/'.$file.'.js'); ?>"></script>
    <?php endforeach; endif; ?>

  </body>
</html>
