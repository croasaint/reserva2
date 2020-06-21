<div class="home container">
    <div class="row">
        <div class="col-12">
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
                
                    <?php foreach ($reservas as $reserva): ?>
                        <tr>
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
                        </tr>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>