jQuery(function($){ 

    if(!$('#variants').length){
        return;
    }

    $('#variants').change( () => {
        let is_purchasable = $(this).find(':selected').attr('data-is_purchasable')
        let is_in_stock = $(this).find(':selected').attr('data-is_in_stock')
        let id = $(this).find(':selected').attr('data-id')
        let currency_symbol = $(this).find(':selected').attr('data-currency_symbol')
        let onsale = $(this).find(':selected').attr('data-sales-price')
        let salesPrice = onsale + currency_symbol
        let price = $(this).find(':selected').attr('data-price') + currency_symbol
        if(onsale){
            $('.price').addClass('onsale')
            $('.sales-price').removeClass('hidden')
            $('.sales-price').text(price)
            $('.displayPrice').text(salesPrice)
        } else{
            $('.sales-price').addClass('hidden')
            $('.price').removeClass('onsale')
            $('.displayPrice').text(price)
        }


        $('.add-to-cart-button').attr('data-variationId',id);
    })

    window.addEventListener('load', ()=>{
        $('#variants').trigger('change')
    })
})