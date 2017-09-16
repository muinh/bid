function getCart() {
    $.ajax({
        url: '/bid.loc/web/index.php/cart/show',
        type: 'GET',
        success: function(response) {
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
        success: function(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
}

$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id'),
        qty = $('.b-set-quantity').val();
    $.ajax({
        url: '/bid.loc/web/index.php/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/bid.loc/web/index.php/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
        }
    });
});

$('#cart .cart-container').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/bid.loc/web/index.php/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(response) {
            if(!response) console.log('Помилка в запиті');
            showCart(response);
            location.reload();
        }
    });
});