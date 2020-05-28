function myFilter(filterBrand) {

    $('#products').children('div').each(function () {
        var brand = $(this).find('input[name="product_brand"]').val();
        if (brand != filterBrand) {
            $(this).hide();
        } else {
            document.getElementById('all_of_brand').style.display = "none";
            document.getElementById('title1').style.display = "block";
            $(this).fadeIn();
        }
    });
}

function showAllBrands(id) {
    var showAllBrands = document.getElementById(id)
    showAllBrands.style.display = "block";
    document.getElementById('title1').style.display = "none";
    myFilter(id)
}
