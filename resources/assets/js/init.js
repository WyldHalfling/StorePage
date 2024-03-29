(function () {
    'use strict';

    $(document).foundation();

    $(function () {

        //SWITCH PAGES
        switch ($("body").data("page-id")){
            case 'home':
                ACMESTORE.homeslider.initCarousel();
                ACMESTORE.homeslider.homePageProducts();
                break;
            case 'product': 
                ACMESTORE.product.details();
                break;
            case 'cart': 
                ACMESTORE.product.cart();
                ACMESTORE.product.payment();
                break;
            case 'adminProduct' :
                ACMESTORE.admin.changeEvent();
                ACMESTORE.admin.delete();
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                ACMESTORE.admin.delete();
                ACMESTORE.admin.create();
                break;
            default:
                //do nothing
        }
    })
})();