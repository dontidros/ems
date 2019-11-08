$('#sm-box').delay(3000).slideUp();

$('.add-to-cart-btn').on('click', function () {
    var id = $(this).data('id');


    $.ajax({
        url: baseUrl + 'shop/add-to-cart',
        type: 'GET',
        dataType: 'html',
        data: {
            pid: id
        },
        //only on reload the cart icon updates
        success: function (res) {
            window.location.reload();
        }
    })
})

//this is the "donkey way"(according to Shlomi) to write this operation but I like it 
$('.field-input-cms').on('focusin', function () {
    $(this).next().removeClass('text-muted').addClass('text-black');
})

$('.field-input-cms').on('focusout', function () {
    $(this).next().removeClass('text-black').addClass('text-muted');
})

//this is the "right" way using jQuery toggleClass method
// $('.field-input-cms').on('focusin-focusout', function () {
//     $(this).next().toggleClass('text-black').toggleClass('text-muted');
// })

String.prototype.toPermalink = function () { //what is this regurlar expresion with this g?
    // return this.toString.trim().toLowerCase().replace(/\s/g, '-');
    return this.trim().toLowerCase().replace(/\s/g, '-');
}

$('.original-text').on('focusout', function () {
    $('.target-text').val($(this).val().toPermalink())
})
