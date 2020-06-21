$(".remove-resource").click(function() {
	var idService = $(this).data("id");
	$.ajax({
		url: baseUrl + "resource/" + idService,
		type: "DELETE",
		error: function() {
			alert("Ha ocurrido un error");
		},
		success: async function() {
			window.location.reload();
		}
	});
});
