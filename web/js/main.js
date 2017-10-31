function getCart() {
    $.ajax({
        url: '/bid.loc/web/index.php/cart/show',
        type: 'GET',
        success(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
    return false;
}

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function clearCart() {
    $.ajax({
        url: '/bid.loc/web/index.php/cart/clear',
        type: 'GET',
        success(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
}

$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let qty = $('.b-set-quantity').val();
    $.ajax({
        url: '/bid.loc/web/index.php/cart/add',
        data: {id, qty},
        type: 'GET',
        success(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/bid.loc/web/index.php/cart/delete',
        data: {id},
        type: 'GET',
        success(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
});

$('#cart .cart-container').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/bid.loc/web/index.php/cart/delete',
        data: {id},
        type: 'GET',
        success(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
            location.reload();
        }
    });
});

$(document).ready($ => {

    /* prepend menu icon */
    $('#nav-wrap').prepend('<div id="menu-icon">Menu</div>');

/* toggle nav */
$("#menu-icon").on("click", function(){
    $("#nav").slideToggle();
    $(this).toggleClass("active");
});

});