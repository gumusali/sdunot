$(function(){
    // vars
    var length = $("div.newSelect").length;
    var down   = [];
    var top    = [];

    // fill arrays
    for( var i  = 0; i < length; i++ ){
        down[i] = 0;
    }

    for( var i = 0; i < length; i++ ){
        top[i] = $("div.newSelect select:eq("+i+")").height();
    }

    // Css
    for( var i = 0; i < length; i++ ){
        $("div.newSelect:eq("+i+")").css({
            "width"  : '100%',
            "height" : top[i]
        });
    }

    // Load options
    for( var i = 0; i < length; i++ ){
        $("div.newSelect:eq("+i+") select option").each(function(){
                $("div.newSelect:eq("+i+") div.newOptions").append("<div class='newOption'>"+$(this).text()+"</div>");
        });
    }

    // Load first option
    for( var i = 0; i < length; i++ ){
        if( $("div.newSelect:eq("+i+") select option:selected").length > 0 )
		{
			$("div.newSelect:eq("+i+") div.newSelected").html($("div.newSelect:eq("+i+") select option:selected").text());
		}
		else
		{
			$("div.newSelect:eq("+i+") select option:eq(0)").attr("selected","selected");
			$("div.newSelect:eq("+i+") div.newSelected").html($("div.newSelect:eq("+i+") select option:eq(0)").text());
		}		
    }

    // Css
    for( var i = 0; i < length; i++ ){
        $("div.newOptions:eq("+i+")").css({
            "top"     : top[i]+3,
            "z-index" : 99
        });
    }


    // Show all options
    $("div.newSelect").click(function(){
        var indis = $(this).index(".newSelect");
        //
        if( down[indis] == 0 ){
            $("div.newOptions:eq("+indis+")").show();
            $("div.newSelectDown:eq("+indis+") ").css("transform","rotate(180deg)");
            down[indis] = 1;
        }
        else {
            $("div.newOptions:eq("+indis+")").hide();
            $("div.newSelectDown:eq("+indis+") ").css("transform","rotate(360deg)");
            down[indis] = 0;
        }
    });

    // Select an option
    $("div.newOption").live('click', function(){
        var opt_indis = $(this).parent().parent().index(".newSelect");
        var ths_indis = $(this).index();

        $("div.newSelect:eq("+opt_indis+") select option").removeAttr("selected");
        $("div.newSelect:eq("+opt_indis+") select option:eq("+ths_indis+")").attr("selected","selected");
        $("div.newSelected:eq("+opt_indis+")").html($("div.newSelect:eq("+opt_indis+") select option:eq("+ths_indis+")").text());
    });
	
	
	// Ajax load
	$("div.newSelect select").on('DOMNodeInserted', function(){
		// Delete old options
		$(this).parent().find("div.newOptions").html('');
		// Load options
		$(this).parent().find("select option").each(function(){
				$(this).parent().parent().find("div.newOptions").append("<div class='newOption'>"+$(this).text()+"</div>");
		});

		// Load first option
		$(this).parent().find("select option:eq(0)").attr("selected","selected");
		$(this).parent().find("div.newSelected").html($(this).parent().find("select option:eq(0)").text());
	});
	
	
	// Checkbox
	$("div.newCheck input:checked").parent().addClass('checked');
	
	$("div.newCheck").click(function(){
		if( $(this).find('input').attr('checked') ){
			$(this).find('input').removeAttr('checked');
			$(this).removeClass('checked');
		}
		else{
			$(this).find('input').attr('checked','checked');
			$(this).addClass('checked');
		}			
	});
});
