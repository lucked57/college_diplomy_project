



if(window.screen.width<=1259){


$(function() {
    $('#contentposts a').click(function(e){
        e.preventDefault();
        $(this).animate({ height: 'toggle', opacity: 'toggle', width: 'toggle'}, 500);
        var t = $(this);
        setTimeout(function(){ location.href = t.attr('href'); }, 500);
        setTimeout(function(){ $("#p_prldr").show(); }, 500);
    });
});
    
}