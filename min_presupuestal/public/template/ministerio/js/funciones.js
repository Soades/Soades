$(document).on("keydown", ".tabcontrol", function (e)
{
    if (e.keyCode == 13) { //enter      
        var nextElement = $('[tabindex="' + (this.tabIndex + 1) + '"]');
        if (nextElement.length)
            nextElement.focus().select();
    }

    if (e.keyCode == 38) { //up            
        var input_sube = $(this);
        var index_sube = input_sube.attr('tabindex');
        $('[tabindex="' + (parseInt(index_sube) - 1) + '"]').focus().select();
        console.log('sube')
    }

    if (e.keyCode == 40) { //down           
        var input_baja = $(this);
        var index_baja = input_baja.attr('tabindex');
        $('[tabindex="' + (parseInt(index_baja) + 1) + '"]').focus().select();
        console.log('baja : ' + input_baja.attr('tabindex'))
    }
});