(function () {
    'use strict';

    $(document).foundation();

    $(function () {

        //SWITCH PAGES
        switch ($("body").data("page-id")){
            case 'home':
                break;
            case 'adminProduct' :
                ACMESTORE.admin.changeEvent();
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