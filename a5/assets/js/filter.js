function filterProduct(filterBrand) {
    $('#products').children('div').first().children('div').each(function () {
        var brand = $(this).find('input[name="product_brand"]').val();
        if (filterBrand == "*" || brand == filterBrand) {
            $(this).fadeIn();
        } else {
            $(this).hide();
        }
    });
}
