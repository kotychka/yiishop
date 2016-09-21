$(function () {
	$("body").on("click", ".product-link", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			url: "/cart/add/" + id,
			success: function (data) {
				$("#cart").html(data)
			}
		});
	});

	$("body").on("click", ".product-rm", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			url: "/cart/remove/" + id,
			success: function (data) {
				$("#cart").html(data)
			}
		});
	});
})