//// Load more functionality

jQuery(function($){ 
	$('.loadmore').click(function(){

        var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': attr.posts,
			'page' : attr.current_page
        };
        
        let initialText = button.text()

        $.ajax({ // you can also use $.post here
			url : attr.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					$('.loadMoreTarget').append(data); // insert new posts
					attr.current_page++;
                    
                    button.text(initialText)

					if ( attr.current_page == attr.max_page ) 
						button.remove(); // if last page, remove the button
                    
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});