$(".remove-service").click(function() {
	var idService = $(this).data("id");
	$.ajax({
		url: baseUrl + "service/" + idService,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
