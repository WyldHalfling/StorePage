(function () {
    'use strict';

    ACMESTORE.admin.create = function () {

        //create subcategory
        $(".add-subcategory").on('click', function (e) {
            let token = $(this).data('token');
            let category_id = $(this).attr('id');
            let name = $("#subcategory-name-"+category_id).val();

            $.ajax({
                type: 'POST',
                url: '/admin/product/subcategory/create',
                data: {token: token, name: name, category_id: category_id},
                success: function (data) {
                    let response = JSON.parse(data);
                    $(".notification").css("display", 'block').removeClass('alert').addClass('primary')
                        .delay(4000).slideUp(300).html(response.success);
                }, 
                error: function (request, error) {
                    let errors = JSON.parse(request.responseText);
                    let ul = document.createElement('ul');
                    $.each(errors, function (key, value) {
                        let li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });
                    $(".notification").css("display", 'block').removeClass('primary').addClass('alert')
                        .delay(6000).slideUp(300).html(ul);
                }
            });

            e.preventDefault();
        })
    };
})();
