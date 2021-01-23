
jQuery(($)=>{
    document.addEventListener('click',(e)=>{

        // Toggle Mobile Menu
        if(e.target.closest('.burger-menu')){
            $('#mobile-nav').toggleClass('active')
        }

        // Open Mobile Menu
        if(e.target.closest('#single-product .nav a')){

            e.preventDefault();

            let button = e.target.closest('#single-product .nav a');

            if(button.classList.contains("active")) return;

            button.parentNode.querySelectorAll('a').forEach( a =>{
                
                if( button === a){
                    a.classList.add('active')
                    $('section.' + a.dataset.section).removeClass('hidden')
                } else {
                    a.classList.remove('active')
                    $('section.' + a.dataset.section).addClass('hidden')
                }            
            });

        };
    })
});