$(function(){
	$("span.deleteComment").click(function(){
		swal({
		  title: "Emin misiniz?",
		  text: "Yorum silindikten sonra geri alınamaz!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    var id = $.trim($(this).attr('id'));

				$.ajax({
					type: 'POST',
					url : '/ajax/yorum-sil',
					data: {'id': id},
					success: function(result) {
						if( result == 'ok' ) {
							swal("Başarılı!", "Yorumunuz silindi", "success").then(function(){
								$("div#"+ id).remove();
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