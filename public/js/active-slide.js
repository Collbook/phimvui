$(document).ready(function() {
    $("#multi-active-slide input:checkbox").on('click', function(event) {
        var checkbox_selected_count = $("#multi-active-slide input:checkbox:checked").length;
        // console.log(checkbox_selected_count);
        if (checkbox_selected_count > 0 || checkbox_selected_count == 0) {
            $('#multi-active-slide button[name=submit]').removeClass('checkbox-selected');
            $('#multi-active-slide button[name=submit]').removeAttr('disabled');
        } else {
            $('#multi-active-slide button[name=submit]').addClass('checkbox-selected');
            $('#multi-active-slide button[name=submit]').attr('disabled', 'disabled');
        }
    });
});
