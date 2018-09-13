jQuery(document).ready(function($) {
    // Ajax Filter data Films with pick Date for New Post Film and new Register
    $("#showDate select.show-date").on('change', function(event) {
        var date = $(this).val();
        var route = $(this).parents('form').attr('action');
        $.ajax({
            url: route,
            data: {date: date},
        })
        .done(function(data) {
            // console.log(data);
            $('#ajax-table-customer-user').html(data);
        })
        .fail(function() {
            console.log("error");
        });
    });
});

