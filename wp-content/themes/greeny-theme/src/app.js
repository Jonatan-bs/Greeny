// Add product to cart
document.addEventListener('click',(e)=>{
    if(e.target.classList.contains('add-to-cart-button')){
        let id = e.target.dataset.id ;
        fetch('/?add-to-cart=' + e.target.dataset.id)
    }
})
