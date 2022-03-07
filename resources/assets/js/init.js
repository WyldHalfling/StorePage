(function () {
    'use strict';

    $(document).foundation();

    $(function () {

        // Switch Pages
        switch ($("body").data("page-id")) {
            case 'home': 
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                //ACMESTORE.admin.delete();
                break;
            default:
                // do nothing
        }
    });
    /** /
    $(document).ready(function () {

        // Switch Pages
        switch ($("body").data("page-id")) {
            case 'home': 
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                //ACMESTORE.admin.delete();
                break;
            default:
                // do nothing
        }
    });
    /**/

})();