let calendar = null;
console.log(idUsuario, idRecurso, baseUrl);
function editEvent(event) {
	$('#event-modal input[name="event-index"]').val(event ? event.id : "");
	$('#event-modal input[name="event-name"]').val(event ? event.name : "");
	$('#event-modal input[name="event-detail"]').val(event ? event.detail : "");
	$('#event-modal input[name="event-start-date"]').datepicker(
		"update",
		event ? event.startDate : ""
	);
	$('#event-modal input[name="event-end-date"]').datepicker({
		startDate: event ? event.endDate : ""
	});
	$('#event-modal input[name="event-end-date"]').datepicker(
		"update",
		event ? event.endDate : ""
	);
	$('#event-modal input[name="event-end-date"]').datepicker("update");

	$('#event-modal input[name="event-name"]+.error').addClass("hidden");
	$('#event-modal input[name="event-detail"]+.error').addClass("hidden");
	$("#event-modal").modal();
}

$("#remove-event").click(function() {
	var id = $('#event-modal input[name="event-index"]').val();

	$.ajax({
		url: baseUrl + "/reservation/" + id,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error en la reserva!");
		},
		success: async function() {
			window.location.reload();
		}
	});
});

function saveEvent() {
	var event = {
		id: $('#event-modal input[name="event-index"]').val(),
		name: $('#event-modal input[name="event-name"]').val(),
		detail: $('#event-modal input[name="event-detail"]').val(),
		startDate: $('#event-modal input[name="event-start-date"]').datepicker(
			"getDate"
		),
		endDate: $('#event-modal input[name="event-end-date"]').datepicker(
			"getDate"
		)
	};
	if (event.name === "") {
		$('#event-modal input[name="event-name"]+.hidden').removeClass("hidden");
		return;
	}

	if (event.detail === "") {
		$('#event-modal input[name="event-detail"]+.hidden').removeClass("hidden");
		return;
	}
	var payload = {
		id_usuario: idUsuario,
		id_recurso: idRecurso,
		fecha_inicio: moment(event.startDate).format("YYYY-MMM-DD"),
		fecha_fin: moment(event.endDate).format("YYYY-MMM-DD"),
		detalles: event.detail,
		name: event.name
	};
	var url = baseUrl + "/reservation/";
	if (event.id) {
		url = url + event.id;
	}

	$.ajax({
		url: url,
		type: "POST",
		data: payload,
		error: function() {
			alert("Ha ocurrido un error en la reserva!");
		},
		success: async function() {
			var dataSource = await calendar.getDataSource()();
			calendar.setDataSource(dataSource);
			$("#event-modal").modal("hide");
			window.location.reload();
		}
	});
}

$(function() {
	var currentDate = new Date();

	calendar = new Calendar("#calendar", {
		enableContextMenu: true,
		enableRangeSelection: true,
		contextMenuItems: [
			{
				text: "Update",
				click: editEvent
			}
		],
		selectRange: function(e) {
			var data = {
				startDate: e.startDate,
				endDate: e.endDate,
				detail: "",
				name: ""
			};
			if (e.events[0]) {
				data = {
					id: e.events[0].id,
					startDate: e.events[0].startDate,
					endDate: e.events[0].endDate,
					detail: e.events[0].detail,
					name: e.events[0].name
				};
			}
			editEvent(data);
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

		dataSource: async function() {
			// Load data from GitHub API
			return fetch(
				`${baseUrl}reservation/get_reservations_by_resource_id/${idRecurso}`
			)
				.then(result => result.json())
				.then(results => {
					if (results) {
						return results.map(r => ({
							id: parseInt(r.id),
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
	calendar.setMinDate(currentDate);
	$("#save-event").click(function() {
		saveEvent();
	});

	$("#delete-event").click(function(e) {
		deleteEvent(e);
	});
});
