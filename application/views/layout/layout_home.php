
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link
      rel="stylesheet"
      href="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://unpkg.com/bootstrap-datepicker@1.8.0/dist/css/bootstrap-datepicker.standalone.min.css"
    />


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
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Calendario <span class="sr-only">(current)</span></a>
      </li>

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
    <script src="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

    <script>
     let calendar = null;

     function editEvent(event) {
       console.log('ajaa')
       $('#event-modal input[name="event-index"]').val(event ? event.id : "");
       $('#event-modal input[name="event-name"]').val(event ? event.name : "");
       $('#event-modal input[name="event-detail"]').val(
         event ? event.detail : ""
       );
       $('#event-modal input[name="event-start-date"]').datepicker(
         "update",
         event ? event.startDate : ""
       );
       $('#event-modal input[name="event-end-date"]').datepicker(
         "update",
         event ? event.endDate : ""
       );
       $("#event-modal").modal();
     }

     function deleteEvent(event) {
       var dataSource = calendar.getDataSource();

       calendar.setDataSource(dataSource.filter(item => item.id == event.id));
     }

     async function saveEvent() {
       var event = {
         id: $('#event-modal input[name="event-index"]').val(),
         name: $('#event-modal input[name="event-name"]').val(),
         detail: $('#event-modal input[name="event-detail"]').val(),
         startDate: $(
           '#event-modal input[name="event-start-date"]'
         ).datepicker("getDate"),
         endDate: $('#event-modal input[name="event-end-date"]').datepicker(
           "getDate"
         )
       };
       var payload={
          id_usuario:1,
          id_recurso:2,
          fecha_inicio:event.startDate,
          fecha_fin:event.endDate,
          detalles:event.detail,
          name:event.name,
        }
       var formData = new FormData();
       for ( var key in payload ) {
          formData.append(key, payload[key]);
        }
       
        $.ajax({
           url: 'http://localhost/reservas/resource/addschedule/2',
           type: 'POST',
           data: payload,
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
            console.log(data)
           }
        });

       
       /* 
       var dataSource = await calendar.getDataSource()();
       console.log(dataSource)
       if (event.id) {
         for (var i in dataSource) {
           if (dataSource[i].id == event.id) {
             dataSource[i].name = event.name;
             dataSource[i].detail = event.detail;
             dataSource[i].startDate = event.startDate;
             dataSource[i].endDate = event.endDate;
           }
         }
       } else {
         var newId = 0;
         for (var i in dataSource) {
           if (dataSource[i].id > newId) {
             newId = dataSource[i].id;
           }
         }

         newId++;
         event.id = newId;

         dataSource.push(event);
       }

       calendar.setDataSource(dataSource); */
       $("#event-modal").modal("hide");
     }

     $(function() {
       var currentYear = new Date().getFullYear();

       calendar = new Calendar("#calendar", {
         enableContextMenu: true,
         enableRangeSelection: true,
         contextMenuItems: [
           {
             text: "Update",
             click: editEvent
           },
           {
             text: "Delete",
             click: deleteEvent
           }
         ],
         selectRange: function(e) {
           editEvent({ startDate: e.startDate, endDate: e.endDate });
         },
         mouseOnDay: function(e) {
           if (e.events.length > 0) {
             var content = "";

             for (var i in e.events) {
               content +=
                 '<div class="event-tooltip-content">' +
                 '<div class="event-detail">' +
                 e.events[i].detail +
                 "</div>" +
                 "</div>";
             }

             $(e.element).popover({
               trigger: "manual",
               container: "body",
               html: true,
               content: content
             });

             $(e.element).popover("show");
           }
         },
         mouseOutDay: function(e) {
           if (e.events.length > 0) {
             $(e.element).popover("hide");
           }
         },
         dayContextMenu: function(e) {
           $(e.element).popover("hide");
         },

         dataSource: function() {
           // Load data from GitHub API
           return fetch(
             `http://localhost/reservas/resource/getschedules/2`
           )
           .then(result=>result.json())
           .then(results => {
               if (results) {
                 return results.map(r => ({
                   startDate: new Date(r.fecha_inicio),
                   endDate: new Date(r.fecha_fin),
                   name: r.name,
                   detail: r.detalles
                 }));
               }

               return [];
             });
         }
       });

       $("#save-event").click(function() {
         saveEvent();
       });
     });
   </script>

  </body>
</html>
