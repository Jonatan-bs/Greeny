let $ = jQuery;
// Add product to cart
document.addEventListener('click',(e)=>{

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

                $('header.greeny .add-to-cart.symbol .qty').show().html(++attr.cartQty)

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
