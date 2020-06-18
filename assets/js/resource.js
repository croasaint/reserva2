$(".remove-resource").click(function() {
	var idService = $(this).data("id");
	$.ajax({
		url: "http://localhost/reservas/resource/" + idService,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
