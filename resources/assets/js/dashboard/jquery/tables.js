/**
 *
 * ////////////////////////////
 * ////// * Jquery Tables / DataTables  * //////
 * ////////////////////////////
 *
 */
    /** 
    * Select row
    */

    $( '#dataTableBuilder' ).on( 'click', 'tbody tr td:last-child', function( e ) {
        e.stopPropagation();
    });

    // Handle click on checkbox
    $( '#dataTableBuilder' ).on( 'click', 'tbody tr', function( event ) {
        var checkbox = $( this ).find( ':checkbox' );
        checkbox.prop( 'checked', !checkbox.is( ':checked' ) );
        //Default value
        $( this ).removeClass( 'selected' );
        //If checked and is not selected -> then select
        if( checkbox.is( ':checked' ) && !$( this ).hasClass( 'selected' ) ) {
            $( this ).addClass( 'selected' );
        }
    });

    $( '.buttons-select-all,.buttons-select-none' ).on( 'click', function( event ) {
        var tr = $( '#dataTableBuilder tbody tr');
        var checkbox = tr.find( ':checkbox' );
        if( tr.hasClass( 'selected' ) ) {
            checkbox.prop( 'checked', true );
        } else {
            checkbox.prop( 'checked', false );
        }
    });