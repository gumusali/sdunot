$(function(){
	$("span.deleteDocument").click(function(){
		swal({
		  title: "Emin misiniz?",
		  text: "Not silindikten sonra geri alınamaz!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    var id = $.trim($(this).attr('id'));

				$.ajax({
					type: 'POST',
					url : '/ajax/not-sil',
					data: {'id': id},
					success: function(result) {
						if( result == 'ok' ) {
							swal("Başarılı!", "Not silindi", "success").then(function(){
								$("tr#"+ id).remove();
							});
						} else {
							swal("Hata!", "Bir hata oluştu", "error");
						}
					}
				});
		  } else {
		    swal("İptal edildi!");
		  }
		});
	});
});