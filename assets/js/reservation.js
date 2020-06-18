$(".remove-reservation").click(function() {
	var idReserv = $(this).data("id");
	$.ajax({
		url: "http://localhost/reservas/" + idReserv,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
