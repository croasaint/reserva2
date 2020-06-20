$(".remove-reservation").click(function() {
	var idService = $(this).data("id");
	$.ajax({
		url: "http://localhost/reservas/reservation/" + idService,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
