$(function() {
	// common
	$('.slider').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        dots: true,
        arrows: false,
		prevArrow: '<a href="#" class="prev"><svg style="display:block" viewBox="0 0 9.3 17" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-linejoin="butt" d="m.5.5 8 8-8 8"/></svg></a>',
		nextArrow: '<a href="#" class="next"><svg style="display:block" viewBox="0 0 9.3 17" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-linejoin="butt" d="m.5.5 8 8-8 8"/></svg></a>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 705,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }]
	});

    //
    $('.products-list-item .image').hover(function() {
        let images = $(this).find('img');
        if (images.length > 1) {
            images.eq(0).hide();
            images.eq(1).show();
        }
    }, function() {
        let images = $(this).find('img');
        if (images.length > 1) {
            images.eq(0).show();
            images.eq(1).hide();
        }
    });

    //
    $('.category-item .opener').click(function() {
        $(this).next().slideToggle();
        return false;
    });

    $('.menu__item').click(function() {
        let index = $(this).parent().index(),
            category = document.getElementsByClassName('category-item')[index];
        category.scrollIntoView();
        $(category).find('.content').slideDown();
        return false;
    });

	//
    if (!localStorage.getItem('age')) {
        $('#overlay, #age-popup').show();
    }

    $('#age-popup a').click(function() {
        $('#overlay, #age-popup').hide();
        localStorage.setItem('age', 1);
        return false;
    });

    //
    let cart = JSON.parse(localStorage.getItem('cart2') || '{}'),
        totalAmount = 0,
        totalPrice = 0,
        cartPopup = $('#cart-popup');

    updateCart(false)

    $('.add-to-cart').click(function() {
        let cont = $(this).closest('.products-list-item, .products-table-item'),
            id = $(this).data('id'),
            title = cont.find('h4').text(),
            price = parseInt(cont.find('.price').text().replace(' ', '')),
            image = $(this).data('image');

        if (id in cart) {
            cart[id].amount += 1;
            cart[id].totalPrice = cart[id].amount * cart[id].price;
        } else {
            cart[id] = {title, price, totalPrice: price, amount: 1, image};
        }

        totalAmount += 1;
        totalPrice += cart[id].totalPrice;

        saveCart();
        drawCart();
        updateMiniCart();

        return false;
    });

    function saveCart() {
        localStorage.setItem('cart2', JSON.stringify(cart));
    }

    function updateMiniCart() {
        $('#mini-cart span').text(totalAmount);
        $('#mini-cart strong').text(`= ${totalPrice.toLocaleString()} р.`);
    }

    function drawCart() {
        let cartHtml = '<h3>Ваш заказ:</h3>';
        cartHtml += '<div class="cart-items">';
        for (let id in cart) {
            cartHtml += `
                <div class="cart-item" data-id="${id}">
                    <div class="image" style="background-image: url(${cart[id].image || '/design/img/no-image.png'})"></div>
                    <div class="info">
                        <h4>${cart[id].title}</h4>
                    </div>
                    <div class="amount">
                        <div class="minus">
                            <img src="/design/img/minus.svg" alt="" width="20" height="20">
                        </div>
                        <span>${cart[id].amount}</span>
                        <div class="plus">
                            <img src="/design/img/plus.svg" alt="" width="20" height="20">
                        </div>
                    </div>
                    <div class="price">${(cart[id].totalPrice).toLocaleString()} р.</div>
                    <div class="remove">
                        <img src="/design/img/remove.svg" alt="" width="20" height="20">
                    </div>
                </div>
            `;
        }
        cartHtml += '</div>';
        cartHtml += `<p class="total">Сумма: ${totalPrice.toLocaleString()} р.</p>`;
        cartPopup.html(cartHtml);
    }

    $('#mini-cart').click(function() {
        $('#cart-popup, #overlay').show();
    });

    $('#overlay').click(function() {
        $('#cart-popup, #overlay').hide();
    });

    cartPopup.on('click', '.minus', function() {
        let id = $(this).closest('.cart-item').data('id');
        if (cart[id].amount <= 1) {
            return;
        }
        cart[id].amount -= 1;
        cart[id].totalPrice = cart[id].amount * cart[id].price;
        updateCart();
    }).on('click', '.plus', function() {
        let id = $(this).closest('.cart-item').data('id');
        cart[id].amount += 1;
        cart[id].totalPrice = cart[id].amount * cart[id].price;
        updateCart();
    }).on('click', '.remove', function() {
        let id = $(this).closest('.cart-item').data('id');
        delete cart[id];
        updateCart();
    });

    function updateCart(save = true) {
        totalAmount = 0;
        totalPrice = 0;
        for (let id in cart) {
            totalAmount += cart[id].amount;
            totalPrice += cart[id].totalPrice;
        }

        if (save) {
            saveCart();
        }

        drawCart();
        updateMiniCart();
    }
});
