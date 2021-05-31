<script>
	$("#logout-btn").on("click", function() {
		var acc = confirm("Are you sure want Logout?");
		if (acc == true) {
			window.location.href = "logout.php";
		} else {

		}
	});

	var labels = $('span'); // cache this for better performance
	$('#filter').keyup(function() {
		var valThis = $(this).val().toLowerCase();

		if (valThis == "") {
			labels.parent().show(); // show all lis
			$('.collapse').collapse("hide");
		} else {
			labels.each(function() {
				var label = $(this); // cache this
				var text = label.text().toLowerCase();

				if (text.indexOf(valThis) > -1) {
					label.parents('a').show(); // show all li liparents up the ancestor tree
					$('.collapse').collapse("show");
				} else {
					label.parent().hide(); // hide current li as it doesn't match
				}
			});
		};
	});
</script>