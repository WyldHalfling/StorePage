(function () {
    ACMESTORE.admin.update = function () {

        // Update product category
        $(".update-category").on('click', function (e) {
            var token = $(this).data('token');
            var id = $(this).attr('id');
            var name = $("#item-name-"+id).val();

            $.ajax({
                type: 'POST',
                url: '/admin/product/categories/' + id + '/edit',
                data: {token:token, name:name},
                success: function (data) {
                    var respone = jQuery.JSON.parse(data);
                    $(".notification").css("display", 'block').delay(4000).slideUp(300).html(respone.success);
                },
                error: function (request, error) {
                    var errors = jQuery.JSON.parse(request.responseText);
                    var ul = document.createElement('ul');

                    $.each(errors, function (key, value) {
                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });
                    $(".notification").css("display", 'block').delay(6000).slideUp(300).html(respone.ul);
                }
            });

            e.preventDefault();
        });
    };
})();