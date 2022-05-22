const { default: axios } = require("axios");

(function () {
    'use strict';

    ACMESTORE.product.cart = function () {
        var app = new Vue({
            el: '#shopping_cart',
            data: {
                items: [],
                cartTotal: [],
                loading: false,
                fail: false,
                message: ''
            },
             methods: {
                displayItems: function (time) {
                    this.loading = true;
                    setTimeout(function () {
                        axios.get('/cart/items').then(function (response) {
                            if (response.data.fail) {
                                app.fail = true;
                                app.message = response.data.fail;
                                app.loading = false;
                            } else {
                                app.items = response.data.items;
                                app.cartTotal = response.data.cartTotal;
                                app.loading = false;
                            }
                        });
                    }, time);
                }, 
                updateQuantity: function (product_id, operator) {
                    var postData = $.param({product_id:product_id, operator:operator});
                    axios.post('/cart/update-qty', postData).then(function (response) {
                        app.displayItems(10);
                    });
                }
             },
             created: function () {
                 this.displayItems(2000);
             }
        });
    }
})();