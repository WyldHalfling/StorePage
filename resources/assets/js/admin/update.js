(function () {
    'use strict';

    ACMESTORE.admin.update = function () {

        //update product category
        $(".update-category").on('click', function (e) {
            let token = $(this).data('token');
            let id = $(this).attr('id');
            let name = $("#item-name-"+id).val();

            $.ajax({
                type: 'POST',
                url: '/admin/product/categories/' + id + '/edit',
                data: {token:token, name:name},
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
        });

        //update subcategory
        $(".update-subcategory").on('click', function (e) {
            let token = $(this).data('token');
            let id = $(this).attr('id');
            let category_id = $(this).data('category-id');
            let name = $("#item-subcategory-name-"+id).val();
            let selected_category_id = $('#item-category-'+category_id + ' option:selected').val();

            if(category_id !== selected_category_id){
                category_id = selected_category_id;
            }

            $.ajax({
                type: 'POST',
                url: '/admin/product/subcategory/' + id + '/edit',
                data: {token: token, name:name, category_id: category_id},
                success: function (data) {
                    let response = JSON.parse(data);
                    $(".notification").css("display", 'block').removeClass('alert').addClass('primary')
                        .delay(4000).slideUp(300).html(response.success);
                },
                error:function (request, error) {
                    let errors = JSON.parse(request.responseText);
                    let ul = document.createElement('ul');
                    $.each(errors, function (key, value) {
                        let li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });
                    $(".notification").css("display", 'block').removeClass('primary').addClass('alert')
                        .delay(6000).slideUp(300)
                        .html(ul);
                }
            });

            e.preventDefault();
        });
    };
})();