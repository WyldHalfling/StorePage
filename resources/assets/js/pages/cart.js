const { default: axios } = require("axios");

(function () {
    'use strict';

    ACMESTORE.product.cart = function () {
        let app = new Vue({
            el: '#shopping_cart',
            data: {
                items: [],
                cartTotal: 0,
                loading: false,
                fail: false,
                authenticated: false,
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
                                app.authenticated = response.data.authenticated;
                            }
                        });
                    }, time);
                }, 
                updateQuantity: function (product_id, operator) {
                    let postData = $.param({product_id:product_id, operator:operator});
                    axios.post('/cart/update-qty', postData).then(function (response) {
                        app.displayItems(10);
                    });
                },
                 removeItem: function (index) {
                    let postData = $.param({item_index:index});
                    axios.post('/cart/remove-item', postData).then(function (response) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(response.data.success);
                        app.displayItems(200);
                    })
                 },
                 removeAllItem: function () {
                    axios.post('/cart/clear_cart').then(function (response) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(response.data.success);
                        app.displayItems(200);
                    });
                 }
             },
             created: function () {
                 this.displayItems(2000);
             }
        });
    }
})();