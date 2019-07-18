$(function(){
	var indis;
	var active;
	var wait = 0;
	
	$("div#menu ul span").click(function(){
		if( wait == 0 )
		{
			wait  = 1;
			indis = $(this).parent().index() - 1;
			
			if( active != indis )
			{
				$("div#menu ul li").slideUp();
				$("div#menu ul:eq("+indis+") li").slideDown(function(){
					active = indis;
					wait = 0;
				});

				if( $("div#menu ul:eq("+indis+") li").length == 0 )
					wait = 0;
			}else{
				$("div#menu ul:eq("+indis+") li").slideUp(function(){
					active = -1;
					wait = 0;
				});
				
				if( $("div#menu ul:eq("+indis+") li").length == 0 )
					wait = 0;
			}
		}
	});
	
	$("div.menuSlide").click(function(){
		var left = $("div#menu").offset().left;
		if( left < 0 ){
			$("div.menuSlide").animate({"marginLeft":"200px"},1000);
			$("div#menu").animate({"left":"0"},1000);
		}else{
			$("div.menuSlide").animate({"marginLeft":"0"},1000);
			$("div#menu").animate({"left":"-200px"},1000);
		}
	});
});