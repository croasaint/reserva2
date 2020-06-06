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