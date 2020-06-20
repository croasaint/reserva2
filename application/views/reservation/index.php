<div class="reservation">
  <div id="calendar"></div>

    <div class="modal fade" id="event-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Formulario de reserva</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="event-index" />
            <form class="form-horizontal">
              <div class="form-group row">
                <label for="event-name" class="col-sm-4 control-label"
                  >Titulo</label
                >
                <div class="col-sm-8">
                  <input
                    id="event-name"
                    name="event-name"
                    type="text"
                    class="form-control"
                    required
                  />
                  <div class="error hidden">*Titulo es requerido</div>

                </div>
              </div>
              <div class="form-group row">
                <label for="event-detail" class="col-sm-4 control-label"
                  >Detalles</label
                >
                <div class="col-sm-8">
                  <input
                    id="event-detail"
                    name="event-detail"
                    type="text"
                    class="form-control"
                  />
                  <div class="error hidden">*Detalles es requerido</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="min-date" class="col-sm-4 control-label"
                  >Fecha</label
                >
                <div class="col-sm-8">
                  <div
                    class="input-group input-daterange"
                    data-provide="datepicker"
                  >
                    <input
                      id="min-date"
                      name="event-start-date"
                      type="text"
                      class="form-control"
                      disabled
                      required
                    />
                    <div class="input-group-prepend input-group-append">
                      <div class="input-group-text">hasta</div>
                    </div>
                    <input
                      id="event-end-date"
                      name="event-end-date"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <?php if( $rol=='admin' ) :?>
              <button type="button" class="btn btn-danger" id="remove-event">
                Borrar
              </button>
            <?php endif; ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancelar
            </button>
            <button type="button" class="btn btn-primary" id="save-event">
            <?= ( $rol=='admin' ) ? 'Editar' : 'Reservar' ?> 
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="context-menu"></div>

</div>
<?='<script>
  const idRecurso='.$id_resource.'
  const idUsuario='.$this->session->user->id.'
</script>'
?>
