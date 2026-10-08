if (!LS.getItem('cartArray')) {
    LS.setItem('cartArray', JSON.stringify({}));
}

function cartArray() {
    return JSON.parse(LS.getItem("cartArray"));
}

function cartAmount() {
    el('#cart-amount-show').innerText = Object.keys(cartArray()).length;
}

/* ДАННЫЕ О ТОВАРАХ */
let prods = [];
function productsInfo() {
    return fetch(urlRoot + '/controllers/c_products.php',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: LS.cartArray
        }
    )
        .then(response => response.json())
}
async function productsInfoInit() {
    prods = await productsInfo();
}
productsInfoInit();
/* ---------- */

/* СУММА ВСЕХ ТОВАРОВ */
function total_sum_cart() {
    let sum = 0;
    D.querySelectorAll('.prod-sum').forEach(td => {
        sum += Number(td.innerText);
    });
    el('#total-sum-cart').innerText = 'Итого: ' + sum;
    C.log( el('#total-sum-cart').innerText );
}
total_sum_cart();
/* ---------- */

/* ИЗМЕНЕНИЕ КОЛИЧЕСТВА ТОВАРОВ ЧЕРЕЗ ИНПУТ */
el('#cart').addEventListener('input', (e) => {
    let et = e.target;
    if( et.classList.contains('cart-prod-amount-input')) {
        const id = et.closest('tr').dataset.id;
        let tempCart = cartArray();
        tempCart[id].amount = Number(et.value);

        let tempCart_prodSum = (Number(tempCart[id].amount) * Number(prods[id].price));
        et.closest('tr').querySelector('.prod-sum').innerHTML = tempCart_prodSum;
        LS.setItem('cartArray', JSON.stringify(tempCart));
        console.log( et.value );
        console.log( et.closest('tr') );
    }
});
/* ---------- */

D.addEventListener("click", (e) => {
    let et = e.target;
    /* РЕНДЕРИНГ ТОВАРОВ В КОРЗИНУ ИЗ LocalStorage */
    if (et.closest("#cart-amount-show")) {
        productsInfo().then(prods => {
            let tempCart = cartArray();

            el('#cart').style.display = 'block';
            el('#cart tbody').innerHTML = '';
            for (p_k in prods) {
                el('tbody').insertAdjacentHTML('beforeend',
                    `<tr data-id="` + prods[p_k]['id'] + `">
                                <td> <img src="img/uploads/`+ prods[p_k]['img'] + `"></td>
                                <td>`+ prods[p_k]['model'] + `</td>
                                <td class="cart-prod-amount"> 
                                    <button class="count_minus" type="submit" name="count_minus">-</button>
                                    <span>
                                        <input class="cart-prod-amount-input" type="number" value="`+ prods[p_k]['amount'] + `">
                                    </span>
                                    <button class="count_plus" type="submit" name="count_plus">+</button>
                                </td>
                                <td>`+ prods[p_k]['price'] + `</td>
                                <td class="prod-sum">
                                    `+ prods[p_k]['price'] * prods[p_k]['amount'] + `
                                </td>
                                <td>
                                    <button class="del_product" type="submit" name="del_product">
                                        <img src="img/icons/bin.png">
                                    </button>
                                </td>
                            </tr>`);
            }
        });
    }
    /* ---------- */

    if (et.closest(".cart-prod-amount")) {
        const id = et.closest("tr").dataset.id;
        const et_tr = et.closest('tr');

        let tempCart = cartArray();
        let cartprod_temp_amount = tempCart[id].amount;

        /* ИЗМЕНЕНИЕ КОЛИЧЕСТВА ТОВАРОВ ЧЕРЕЗ КНОПКИ + И - */
        if (et.closest(".count_plus")) {
            cartprod_temp_amount++;
        }

        if (et.closest(".count_minus")) {
            if (cartprod_temp_amount > 1) {
                cartprod_temp_amount--;
            } else {
                delete tempCart[id];
            }
        }
        /* ---------- */

        /* ПОДСЧЕТ КОЛИЧЕСТВА ОДНОГО ТОВАРА */
        if( tempCart[id] ) {
            tempCart[id].amount = cartprod_temp_amount;
            et.closest(".cart-prod-amount").querySelector('.cart-prod-amount-input').value = cartprod_temp_amount;

            LS.setItem("cartArray", JSON.stringify(tempCart));
            if (et_tr) {
                let tempCart_prodSum = (Number(tempCart[id].amount) * Number(prods[id].price));
            et.closest('tr').querySelector('.prod-sum').innerHTML = tempCart_prodSum;
            }
        } else {
            et_tr.remove();
        }
        /* ---------- */
    }

    /* ДОБАВЛЕНИЕ ТОВАРОВ В КОРЗИНУ LS */
    if (et.closest(".price_buy")) {
        const prBuyBtn = et.closest('.price_buy');
        const productId = prBuyBtn.dataset.id;
        C.log(prBuyBtn);
        C.log(prBuyBtn.dataset.id);

        let tempCart = cartArray();
        if (!tempCart[productId]) {
            let cartNewItem = {
                id: productId,
                amount: 1,
            };
            tempCart[productId] = cartNewItem;
        } else {
            tempCart[productId].amount += 1;
        }
        LS.setItem("cartArray", JSON.stringify(tempCart));
        cartAmount();
    }
    /* ---------- */

    /* УДАЛЕНИЕ ТОВАРА ИЗ КОРЗИНЫ */
    if (et.closest(".del_product")) {
        let cartArr = cartArray();
        let cartProductId = et.closest("tr").dataset.id;
        delete cartArr[cartProductId];
        localStorage.setItem("cartArray", JSON.stringify(cartArr));
        const id = et.closest("tr").dataset.id;
        let tempCart = cartArray();
        delete tempCart[id];
        et.closest("tr").remove();
    }
    /* ---------- */

    /* ОТКРЫТИЕ ОКНА КОРЗИНЫ С ТОВАРАМИ */
    if (et.closest('.close_block_button')) {
        el('#cart').style.display = 'none';
    }
    /* ---------- */

    total_sum_cart();
    cartAmount();
});
cartAmount();


	if (el("#cart-contact-form")) {
		el("#cart-contact-form").addEventListener('submit', function (e) {
            C.log('321');
			e.preventDefault();
			let xhr = new XMLHttpRequest();
			let formdata = new FormData(this);
            formdata.append('cart', LS.cartArray );

            C.log(formdata);
			xhr.open('post', urlRoot + '/controllers/c_cart.php');
			xhr.send(formdata);

			xhr.onload = function (ev) {
				C.log(xhr.response);
				if (xhr.status = 200) {
					C.log(this);
					el("#cart-contact-form").innerHTML = 'Форма успешно отправлена и получена ';
                    el('.block-cart tbody').innerHTML = '';
                    el('#total-sum-cart').innerHTML = '';
                    LS.setItem('cartArray', JSON.stringify({}));
				}
			}
		});
	}