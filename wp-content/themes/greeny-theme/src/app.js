let $ = jQuery;

function updateCartAmount(amount){
    $('header.greeny .add-to-cart.symbol .qty').show().html(amount)
    $('#mobile-menu .add-to-cart.symbol .qty').show().html(amount)
}

document.addEventListener('click',(e)=>{
    // Open Mobile Menu
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

        
        if (positionFromTop - windowHeight <= -150) {
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


