/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function tru() {
    var amountInput = document.getElementById('amount');
    var amount = parseInt(amountInput.value);
    if (amount > 0) {
        amountInput.value = amount - 1;
    }
}
            
function cong() {
    var amountInput = document.getElementById('amount');
    var amount = parseInt(amountInput.value);
    amountInput.value = amount + 1;
}