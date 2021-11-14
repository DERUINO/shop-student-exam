$(document).ready(function () {
    closeAuthBlock();
    openAuthBlock();
    switchAuthType();
    noAuthAddCart();
    confirmOrder();
});

function closeAuthBlock() {
    $('.close-mask').click(function () {
        $('.authblock').fadeOut();
    });
}

function openAuthBlock() {
    $('.header-authblock').click(function () {
        $('.authblock').fadeIn();
    });
}

function switchAuthType() {
    $('.register-link').click(function () {
        $('.switchAuth').hide();
        $('.register').show();
    });

    $('.auth-link').click(function () {
        $('.switchAuth').hide();
        $('.auth').show();
    });
}

function noAuthAddCart() {
    $('.noAuthAddCart').click(function () {
        alert('Авторизуйтесь для добавления товаров в корзину!');
    });
}

function confirmOrder() {
    $('.cartblock .confirmOrder').click(function () {
        $('.cartblock .modal-container').fadeIn();
    });

    $('.cartblock .answerblock .no').click(function () {
        $('.cartblock .modal-container').fadeOut();
    });
}