jQuery(($) => {
    function updateCartAmount(amount){
        $('header.greeny .add-to-cart.symbol .qty').show().html(amount)
        $('#mobile-menu .add-to-cart.symbol .qty').show().html(amount)
    }

    //Update amount when cart is updated
    $(document.body).on('updated_cart_totals', function () {
        // Get the formatted cart total
        let amount = Array.from($('input.qty')).reduce((accumulator, currentValue) => accumulator + Number(currentValue.value), 0);
        updateCartAmount(amount)
    
    })

    document.addEventListener('click',(e)=>{
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
                let variationID = button.dataset.variationid ? '&variation_id=' + button.dataset.variationid : '';

                fetch('/?add-to-cart=' + button.dataset.id + variationID)
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
    })
})
  