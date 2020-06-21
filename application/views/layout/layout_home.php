<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script defer src="<?=base_url('/assets/js/all.min.js')?>"></script>
 
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
  
      <nav class="navbar navbar-expand-xl navbar-dark" style="background-color:#346cb0">
        <a class="navbar-brand" href="<?=base_url('/')?>">Cabildo</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample06" style="">
          <ul class="navbar-nav mr-auto">
            <?php if( $rol=='admin' ) :?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('servicios/')?>">Gestionar Servicios</a>
              </li>
            <?php endif; ?>

            <?php if( $rol=='admin' ) :?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('usuarios/')?>">Gestionar Usuarios</a>
              </li>
            <?php endif; ?>

            <?php if( $rol=='member' ) :?>
              <?php
                $key = array_search($this->session->user->id_servicio, array_column($services, 'id'));
              ?>
              <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('servicio/'.$services[$key]->id.'/recursos')?>"><?=$services[$key]->nombre?></a>
              </li>
            <?php endif; ?>

            <?php if( $rol=='visitor' ) :?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Servicios
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown06">
                  <?php if(isset($services) && !empty($services)): foreach($services as $service): ?>
                    <a class='dropdown-item' href="<?=base_url('servicio/'.$service->id.'/recursos')?>">
                      <?=$service->nombre?>
                    </a>
                  <?php endforeach; endif; ?>
                </div>
              </li>
            <?php endif; ?>

          </ul>
          <ul class="navbar-nav my-2 my-md-0">
            <?php if($rol=='visitor'):?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/login')?>">Iniciar Sesión</a>
              </li>
            <?php endif; ?>


            <?php if($rol=='visitor'):?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/registro')?>">Registrarse</a>
              </li>
            <?php endif; ?>

            
            <?php if($rol!='visitor'):?>        
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/signout');  ?>">Salir</a>
              </li>

              
              <li class="nav-item" >
                <p class="nav-link" style="color:white;margin: 0; font-weight: bold;"><i class="fas fa-user"></i><?= $this->session->user->username ?></p>
              </li>
            <?php endif; ?> 
          </ul>
        </div>
      </nav>
      
      <div class="content">        
        <?php if(isset($content)):?>
          <?=$content?>
        <?php endif; ?>
      </div>

      <footer class="page-footer font-small blue pt-5"  >
        <p class="mt-5 mb-3 text-muted text-center">© Pablo Torres 2º ASIR 2020</p>
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
