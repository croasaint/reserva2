<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!----- Inicio External Style Sheets ------------->
    <?php if (isset($css) && !empty($css)): foreach ($css as $file): ?>
			<link href="<?php echo get_cached_filename('/assets/css/' . $file . '.css'); ?>" rel="stylesheet" />
	  <?php endforeach; endif; ?>
    <!----- Fin External Style Sheets ------------->
    
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
        <a class="navbar-brand " href="<?=base_url('/')?>">Cabildo</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav flex-row w-100">
      
      
            <?php if( $rol=='admin' ) :?>
              <li class="nav-item pr-3">
                  <a class="nav-link" href="<?=base_url('servicios/')?>">Gestionar Servicios</a>
              </li>
            <?php endif; ?>


            <?php if( $rol=='member' ) :?>
              <?php
                $key = array_search($this->session->user->id_servicio, array_column($services, 'id'));
              ?>
              <li class="nav-item pr-3">
                  <a class="nav-link" href="<?=base_url('servicio/'.$services[$key]->id.'/recursos')?>"><?=$services[$key]->nombre?></a>
              </li>
            <?php endif; ?>
            
            
            <?php if( $rol=='visitor' ) :?>
              <li class="nav-item dropdown pr-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Servicios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                    <a class='dropdown-item' href="<?=base_url('servicio/'.$service->id.'/recursos')?>">
                      <?=$service->nombre?>
                    </a>
                  <?php endforeach; endif; ?>
                </div>
              </li>
            <?php endif; ?>
          
            
            <?php if($rol=='visitor'):?>
            <li class="nav-item ml-auto pr-2">
              <a class="nav-link" href="<?=base_url('/login')?>">Iniciar Sesión</a>
            </li>
            <?php endif; ?>


            <?php if($rol=='visitor'):?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('/registro')?>">Registrarse</a>
            </li>
            <?php endif; ?>

            
            <?php if($rol!='visitor'):?>
              <li style="display: flex;justify-content: center;align-items: center;" class="nav-item ml-auto pr-2">
                <p style="color:white;margin: 0; font-weight: bold;"><?= $this->session->user->username ?></p>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/signout');  ?>">Salir</a>
              </li>
            <?php endif; ?>          
          
          </ul>
        </div>
      </nav>
      
      <div class="content container p-5 ">        
        <?php if(isset($content)):?>
          <?=$content?>
        <?php endif; ?>
     
          
        <?php if(isset($reservas)):?>
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
                <?php if($rol=='admin' ) :?>
                  <th scope="col">Acciones</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($reservas as $reserva): ?>

                  <th scope='row'><?= $reserva->nombrer ?></td>
                  <td><?= $reserva->nombres ?></td>
                  <td><?= $reserva->localizacion ?></td>
                  <td><?= $reserva->usuario ?></td>
                  <td><?= $reserva->fechai?></td>
                  <td><?= $reserva->fechaf?></td>
                  <?php if($rol=='admin' ) :?>
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
                <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <footer class="page-footer font-small blue pt-5"  >
        <div class="footer-copyright text-center ">Pablo Torres 2º ASIR 2020</div>
      </footer>


      <!------ Inicio Scripts ------------->
      <script>
        var baseUrl = '<?= base_url() ?>';
        var rol='<?= $rol ?>'
      </script>
      <?php if(isset($js) && !empty($js)): foreach($js as $file): ?>
        <script type="text/javascript" src="<?php echo get_cached_filename('assets/js/'.$file.'.js'); ?>"></script>
      <?php endforeach; endif; ?>
      <!------ Fin Scripts ------------->
  </body>
</html>
