$(document).ready(function() {
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });

    // <============================================================================================>
    // Confirm Delete User
    // $('button.deleteAll').on('click',function(e){
    //     if(!confirm('Bạn chắc chắn xóa những thành viên này?')){
    //         e.preventDefault();
    //     }
    // });

    // <============================================================================================>
    // Hidden Flash Error
    $("body").on('click', function(event) {
        $("span.click-to-hidden").parents('.box-header').hide();
    });

    // <========================================================================================================
    // Enable disable button for event delete and approve Film
    
    $("form#multi-action button[type=submit]").click(function() {
        $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });

    $("#multi-action input:checkbox").on('click', function(event) {
        var checkbox_selected_count = $("#multi-action input:checkbox:checked").length;
        // console.log(checkbox_selected_count);
        if (checkbox_selected_count > 0) {
            $('#multi-action button[type=submit]').removeClass('checkbox-selected');
            $('#multi-action button[type=submit]').removeAttr('disabled');
        } else {
            $('#multi-action button[type=submit]').addClass('checkbox-selected');
            $('#multi-action button[type=submit]').attr('disabled', 'disabled');
        }
    });


    // Check all on click
    // $('input#checkbox-all').change(function() {
    //     var checkboxes = $(this).closest('div#multi-action-admin').find(':checkbox');
    //     checkboxes.prop('checked', $(this).is(':checked'));
    // });

    // <========================================================================================================
    // Enable disable button for event delete and unlock User (Admin and Customer)
    $("div#multi-action-admin button[name=submit]").click(function() {
        $("button[name=submit]", $(this).parents("div")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });

    $("#multi-action-admin input:checkbox").on('click', function(event) {
        var checkbox_selected_count = $("#multi-action-admin input:checkbox:checked").length;
        // console.log(checkbox_selected_count);
        if (checkbox_selected_count > 0) {
            $('#multi-action-admin button[name=submit]').removeClass('checkbox-selected');
            $('#multi-action-admin button[name=submit]').removeAttr('disabled');
        } else {
            $('#multi-action-admin button[name=submit]').addClass('checkbox-selected');
            $('#multi-action-admin button[name=submit]').attr('disabled', 'disabled');
        }
    });
    // <==============================================ACTIVE SLIDE==========================================================


});