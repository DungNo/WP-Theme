( function( api ) {
    var cssTemplate = wp.template( 'cct-color-scheme' ),
        colorSchemeKeys = [
            'footer_bg_color',
            'footer_text_color',
        ],
        colorSettings = [
            'footer_bg_color',
            'footer_text_color',
        ];
    // Generate the CSS for the current Color Scheme.
    function updateCSS() {
        var scheme = api( 'footer_bg_color' )(),
            css,
            colors = _.object( colorSchemeKeys, '' );

        // Merge in color scheme overrides.
        _.each( colorSettings, function( setting ) {
            colors[ setting ] = api( setting )();
        } );

        css = cssTemplate( colors );

        api.previewer.send( 'update-color-scheme-css', css );
    }

    // Update the CSS whenever a color setting is changed.
    _.each( colorSettings, function( setting ) {
        api( setting, function( setting ) {
            setting.bind( updateCSS );
        } );
    } );
} )( wp.customize );