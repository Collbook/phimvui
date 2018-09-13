$(document).ready(function() {
    $('#example1').DataTable( {
        "ordering": false,
    } );
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false,
        });
    });

    $('a.deleteFilm').on('click',function(e){
        if(!confirm('Bạn chắc chắn xóa bộ phim này # ' + $(this).attr('title'))){
            e.preventDefault();
        }
    });

    // Ajax Filter data Films with action Approve
    $('a.approve-film').on('click',function(e){
        e.preventDefault();
        if(!confirm('Bạn chắc chắn duyệt bộ phim này này # ' + $(this).attr('title'))){
        }
        else{
            var href = $(this).attr('href');
            // console.log(id);
            $.ajax({
                url: href,
                // data: {id: id},
            })
            .done(function(data) {
                // console.log(data);
                $('#filterDate').html(data);
            })
            .fail(function() {
                console.log("error");
            });
        }
    });

    // Hidden Flash Error
    $("body").on('click', function(event) {
        $("span.click-to-hidden").hide();
    });

    // Muliple action Ajax (Approve and Delete Films)
    $("form#postfilm-multi-checbox button[type=submit]").click(function() {
        $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });

    $('form#postfilm-multi-checbox').on("submit", function(e){
        e.preventDefault();

        var action = $("button[type=submit][clicked=true]").val();
        var route = $(this).attr('action');

        var ids = $(this).find("input:checkbox:checked").map(function(){
            return $(this).val();
        }).get();
        // console.log(ids);
        $.ajax({
            url: route,
            type: 'GET',
            data: {action: action, id: ids},
        })
        .done(function(data) {
            // console.log(data);
            $('#filterDate').html(data);
        })
        .fail(function() {
            console.log("error");
        });
        
    });

    $("#postfilm-multi-checbox input:checkbox").on('click', function(event) {
        var checkbox_selected_count = $("#postfilm-multi-checbox input:checkbox:checked").length;
        // console.log(checkbox_selected_count);
        if (checkbox_selected_count > 0) {
            $('#postfilm-multi-checbox button[type=submit]').removeClass('checkbox-selected');
            $('#postfilm-multi-checbox button[type=submit]').removeAttr('disabled');
        } else {
            $('#postfilm-multi-checbox button[type=submit]').addClass('checkbox-selected');
            $('#postfilm-multi-checbox button[type=submit]').attr('disabled', 'disabled');
        }
    });

    // =======================================================================================

    $('a.deleteUser').on('click',function(e){
        if(!confirm('Bạn chắc chắn xóa người dùng này # ' + $(this).attr('title'))){
            e.preventDefault();
        }
    });
    
});