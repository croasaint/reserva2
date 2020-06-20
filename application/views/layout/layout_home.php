
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand pb-4" href="<?=base_url('/')?>">Cabildo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav flex-row w-100">
    <?php if(isset( $this->session->user) && $this->session->user->rol==1 ) :?>
      <li class="nav-item pr-3">
        <a class="nav-link" href="<?=base_url('servicios/')?>">Gestionar Servicios</a>
      </li>

      <li class="nav-item dropdown pr-2">
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

          } ?>

        </div>
      </li>
    <?php endif; ?>
    <?php if((!isset( $this->session->user) || $this->session->user->rol==2) ):?>


      <li class="nav-item">
    <?php  if(isset($userService)){

      foreach ($userService as $usersr){
    ?>
    <a class="nav-link " href="<?=base_url('service/show/'.$usersr->id_servicio)?>"><?= $usersr->nombre ?></a>
  </li>
<?php
}}
else{ }
  ?>
      <?php endif; ?>
      <?php if(!isset( $this->session->user)):?>
      <li class="nav-item ml-auto pr-2">
        <a class="nav-link" href="<?=base_url('/login')?>">Iniciar Sesión</a>
      </li>
      <?php endif; ?>

      <?php if(!isset( $this->session->user)):?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/registro')?>">Registrarse</a>
      </li>
      <?php endif; ?>

      <?php if(isset( $this->session->user)):?>
        <li class="nav-item ml-auto pr-2">
          <p class="nav-link"><?= $this->session->user->username ?></p>
        </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/signout');  ?>">Salir</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>


</nav>

<div class="content container p-5 ">
    <?php if(isset($content)){ echo $content;} ?>

    <?php if(isset($reservas)){?>

  <h2 class="col-md-12">Reservas realizadas</h2>
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre del Recurso</th>
          <th scope="col">Nombre del Servicio</th>
          <th scope="col">Localidad</th>
          <th scope="col">Usuario</th>
          <th scope="col">Fecha de Inicio</th>
          <th scope="col">Fecha Fin</th>
          <?php if(isset( $this->session->user) && $this->session->user->rol==1 ) :?>
          <th scope="col">Acciones</th>
        <?php endif; ?>

        </tr>
      </thead>
      <tbody>
        <tr>
        <?php

        foreach ($reservas as $reserva){
          ?>

          <th scope='row'><?= $reserva->nombrer ?></td>
          <td><?= $reserva->nombres ?></td>
          <td><?= $reserva->localizacion ?></td>
          <td><?= $reserva->usuario ?></td>
          <td><?= $reserva->fechai?></td>
          <td><?= $reserva->fechaf?></td>
          <?php if(isset( $this->session->user) && $this->session->user->rol==1 ) :?>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reservModal<?=$reserva->id?>" >Borrar</button>
            <!-- Modal -->
            <div class="modal fade" id="reservModal<?=$reserva->id?>" tabindex="-1" role="dialog" aria-labelledby="reservModalLabel<?= $reserva->id?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="reservModalLabel<?=$reserva->id?>">Borrar <?=$reserva->nombrer?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Esta accion borrara la reserva <?=$reserva->nombrer?>. Desea continuar?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger remove-reservation" data-id="<?=$reserva->id?>">Borrar</button>
              </div>
              </div>
            </div>
            </div>
          </td>
        <?php endif; ?>
      </td></tr></tbody>

    <?php } }else{} ?>

    </table>
</div>

<footer class="page-footer font-small blue pt-5"  >


  <div class="footer-copyright text-center ">Pablo Torres 2º ASIR 2020 <br><br><br>
    <a href="<?= base_url('');  ?>"><button class="btn btn-secondary text-center py-3" type="button" name="volver">Ir a Principal</button></a>
  </div>


</footer>
    <?php if(isset($js) && !empty($js)): foreach($js as $file): ?>
    <script type="text/javascript" src="<?php echo get_cached_filename('assets/js/'.$file.'.js'); ?>"></script>
    <?php endforeach; endif; ?>

  </body>
</html>
