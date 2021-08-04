(function($){
    var style = $( '#cct-color-scheme-css' ),
        api = wp.customize;

    if ( ! style.length ) {
        style = $( 'head' ).append( '<style type="text/css" id="cct-color-scheme-css" />' )
            .find( '#cct-color-scheme-css' );
    }
    api("footer_text", function(value) {
        value.bind(function(newval) {
            $(".footer_text").html(newval);
        });
    });
    // Color Scheme CSS.
    api.bind( 'preview-ready', function() {
        api.preview.bind( 'update-color-scheme-css', function( css ) {
            style.html( css );
        } );
    } );
})(jQuery);