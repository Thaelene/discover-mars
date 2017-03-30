$(function() {

    $(document).on({click: function() {
        
        $.post( "include/addView.php", { id: $(this).data("photo") }).done(function( data ) {
        });	

    }}, ".imagePhoto");

});