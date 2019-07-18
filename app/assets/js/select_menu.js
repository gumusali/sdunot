$(function() {
	// get departments
	$("select#fakulte").on('change', function() {
		var faculty = $.trim($(this).val());

		$.ajax({
			type: "POST",
			url : "/ajax/bolum",
			data: {'faculty': faculty},
			success: function(result) {
				$("select#bolum").html(result);
			}
		});
	});

	// get semesters
	$("select#bolum").on('change', function() {
		var department = $.trim($(this).val());

		$.ajax({
			type: "POST",
			url : "/ajax/donem",
			data: {'department': department},
			success: function(result) {
				$("select#donem").html(result);
			}
		});
	});

	// get lessons
	$("select#donem").on('change', function() {
		var semester   = $.trim($(this).val());
		var department = $.trim($("select#bolum").val());

		$.ajax({
			type: "POST",
			url : "/ajax/dersler",
			data: {'semester': semester, "department": department},
			success: function(result) {
				$("select#ders").html(result);
			}
		});
	});
});