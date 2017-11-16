$(document).foundation()



    $(".closeCanvas").click(function () {
            $('#offCanvasBottom1').foundation('close');

    });
    

var nextId = 1;
var  inputContent = document.getElementById('inputContent');

function addLabel() {
	if(nextId<=5){
		var input = document.createElement("input");
	    var btn = document.getElementById('btn_curps');
	    input.setAttribute("type", "text") ;
	    input.setAttribute("placeholder", "Ingrese su CURP*");
	    input.id = "curp" +'_' + nextId;
	    input.name = "curp" +'_' + nextId;	
	    inputContent.appendChild(input);
	    btn.onclick = addLabel;    
    	nextId += 1;
	}    
}

addLabel();


( function( $, window, document, undefined )
{
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
})( jQuery, window, document );