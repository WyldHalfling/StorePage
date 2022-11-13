(function () {
    'use strict';

    ACMESTORE.admin.delete = function () {

        $('table[data-form="deleteForm"]').on('click', '.delete-item', function (e) {
            e.preventDefault();
            let form = $(this);

            $('#confirm').foundation('open').on('click', '#delete-btn', function () {
                form.trigger('submit'); // form.submit(); // depreciate
            });
        });
    };
})();