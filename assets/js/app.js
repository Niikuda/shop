const C = console;
const D = document;

const LS = localStorage;
const urlRoot = window.location.origin;

function el(e) {
    return D.querySelector(e);
}

/* 
- в localstorage имеется массив в формате JSON с id товаров
    - Пользователь нажимает на кнопку "купить"
    - кнопка передаёт id товара в корзину
    - id товара добавляется в массив товаров localstorage
*/

