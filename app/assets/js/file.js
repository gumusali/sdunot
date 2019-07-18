$(function(){
	$("input[type=file]").on('change', function(){
		var name  = $(this).val();
		var c;
		
		if( name.includes("\\") ){
			name = name.split("\\");
			c 	 = name.length - 1;
			name = name[c];
		}

		if( name.length > 50 ){
			name = name.substring(0, 50);
			name = name + '...';
		}
		
		$(this).parent().find("label").html(name+" - Seçildi");
	});
});