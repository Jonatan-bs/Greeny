let $ = jQuery;

function updateCartAmount(amount){
    $('header.greeny .add-to-cart.symbol .qty').show().html(amount)
    $('#mobile-menu .add-to-cart.symbol .qty').show().html(amount)
}

//Update amount when cart is updated
$(document.body).on('updated_cart_totals', function () {
    // Get the formatted cart total
    let amount = Array.from($('input.qty')).reduce((accumulator, currentValue) => accumulator + Number(currentValue.value), 0);
    updateCartAmount(amount)
  
});

document.addEventListener('click',(e)=>{
    // Open Mobile Menu
    if(e.target.closest('#single-product .nav a')){

        let button = e.target.closest('#single-product .nav a');

        if(button.classList.contains("active")) return;

        button.parentNode.querySelectorAll('a').forEach( a =>{
            
            if( button === a){
                a.classList.add('active')
                $('.' + a.dataset.section).removeClass('hidden')
            } else {
                a.classList.remove('active')
                $('.' + a.dataset.section).addClass('hidden')
            }            
        });


        // $('.' + button.dataset.section).removeClass('hidden')
        // $('.' + button.dataset.section).addClass('active')
        // console.log( button);

    }

    // Single page nav
    if(e.target.closest('.burger-menu')){
        $('#mobile-nav').toggleClass('active')
    }
      

    // Add product to cart
    if(e.target.closest('.add-to-cart-button')){

        let button = e.target.closest('.add-to-cart-button');
        
        // Button add to cart button
            let id = button.dataset.id;

            $(button).children().animate( { "opacity" : .1 }, 100 )
           
            // Show spinner
            let spinner = document.createElement('img')
            spinner.classList.add('spinner')
            let spinnerSrc = button.classList.contains('light')? '/spinner-light.svg' : '/spinner.svg';
            spinner.src = attr.imageurl + spinnerSrc
            button.appendChild(spinner)


            fetch('/?add-to-cart=' + button.dataset.id)
            .then(()=>{
                let tick = document.createElement('img')
                tick.classList.add('tick')
                let tickSrc = button.classList.contains('light')? '/tick-light.svg' : '/tick.svg';
                tick.src = attr.imageurl + tickSrc
                button.replaceChild(tick, spinner)
                
                updateCartAmount(++attr.cartQty)

                setTimeout(()=>{
                    tick.parentNode.removeChild(tick);
                    $(button).children().animate( { "opacity" : 1 }, 300 )

                },1000)
            })
            .catch((e)=>{
                console.log('error')
                console.log(e)
            })
       
    }
});

// Animate in

function checkPosition() {
    let windowHeight = window.innerHeight;
    let elements = document.querySelectorAll('.animate:not(.activated):not(.animating)');
    let array = [];
    for (let i = 0; i < elements.length; i++) {
        let element = elements[i];
        let positionFromTop = elements[i].getBoundingClientRect().top;

        
        if (positionFromTop - windowHeight <= -150 || element.classList.contains('run')) {
            if(element.classList.contains('sequence')){
                element.classList.add('animating');
                array.push(element)
            } else{
                element.classList.add('activated');
            }
        }

    }
    if(array.length){
        array.forEach((elm,i)=>{
         setTimeout(()=>{
             elm.classList.add('activated');
         }, i*100)
        })  
    }
   
}

document.querySelector('body').addEventListener('scroll', checkPosition);
window.addEventListener('resize', checkPosition);

checkPosition();



//// Load more functionality

jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.loadmore').click(function(){

        var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': attr.posts, // that's how we get params from wp_localize_script() function
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