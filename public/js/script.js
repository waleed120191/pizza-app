$(document).ready(function () {

    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("fast");
    });

    $(".menu-form").submit(function (event) {
        event.preventDefault();
        var pizza_id = $(this).data("id");

        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url: $(this).attr('action'),

            beforeSend: function () {
                $("#item-" + pizza_id + "-add").hide();
                $("#item-" + pizza_id + "-add-loader").show();
            },

            complete: function () {
                $("#item-" + pizza_id + "-add-loader").hide();
                $("#item-" + pizza_id + "-add").show();
            },

            success: function (response) {
                $("#item_count").html(response.item_count);
                $('#main_cart').html(response.view);
                $(".main-color-text").html('&euro;' + response.subtotal);

            }
        });
    });
    $('body').on('click', '.change_count', function (e) {

        e.preventDefault();
        var current_val = $(this).parent().find('input[name=quantity]').val();
        var new_val = parseInt(current_val);

        if ($(this).hasClass('plus')) {
            new_val++;
        } else {
            new_val--;
        }
        if (new_val == 0)
            new_val = 1;

        $(this).parent().find('input[name=quantity]').val(new_val);

        $.ajax({
            data: $(this).parent().serialize(),
            type: 'PUT',
            url: $(this).parent().attr('action'),
            context: this,

            success: function (response) {

                $(".main-color-text").html('&euro;' + response.subtotal);
                $(this).closest('.shopping-cart-item').find('.item-price').html('&euro;' + response.item_price_sum);
                $(this).closest('.shopping-cart-item').find('input[name=quantity]').val(response.item_quantity);
                $(this).closest('.shopping-cart-item').find('.item-quantity').text(parseInt(response.item_quantity));

            }
        })
    });

    $('body').on('click', '.remove_item', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            context: this,
            type: 'DELETE',
            data: {_token: $(this).data('token')},
            success: function (response) {
                $(this).parents('.shopping-cart-item').remove();
                $(".main-color-text").html('&euro;' + response.subtotal);
                $("#item_count").html(response.item_count);
                if (response.is_empty) {
                    $('#checkout').remove();
                }
            }
        })
    });

});
