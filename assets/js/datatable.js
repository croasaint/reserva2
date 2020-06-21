$(document).ready(function() {
	$("#example").DataTable({
		language: {
			search: "Buscar",
			sLengthMenu: "Visualizar _MENU_ resultados",
			paginate: {
				previous: "Anterior",
				next: "Siguiente"
			},
			emptyTable: "No hay datos disponibles"
		}
	});
});
