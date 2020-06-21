$(".remove-user").click(function() {
	var idUser = $(this).data("id");
	$.ajax({
		url: "http://localhost/reservas/user/" + idUser,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
