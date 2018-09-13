<script>
    $(document).ready(function() {
        // Confirm Before Approve New Post Film
        $('button[value="approve"]').on('click',function(e){
            if(!confirm('Bạn chắc chắn duyệt các bộ phim này?')){
                e.preventDefault();
            }
        });

        // Confirm Before Delete New Post Film
        $('button[value="delete"]').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa các bộ phim này?')){
                e.preventDefault();
            }
        });
    
        <?php foreach ($comments as $comment): ?>
            // Ajax for Approve Comments
            $("a.approveComment{{ $comment->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id = {{ $comment->id }};
                var type = 'all';
                $.ajax({
                    url: href,
                    data: {id: id, type: type},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div#approveModal{{ $comment->id }}').removeClass('in').modal('hide');
                    $('div#showModal{{ $comment->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });


            // Ajax for Delete Comments
            $("a#deleteComment{{ $comment->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id = {{ $comment->id }};
                var type = 'all';
                $.ajax({
                    url: href,
                    data: {id: id, type: type},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div#deleteModal{{ $comment->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });

        <?php endforeach ?>

        // Muliple action Ajax (Approve and Delete Commnets)
        $("form#multi-action-cmt button[type=submit]").click(function() {
            $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
            $(this).attr("clicked", "true");
        });

        $('form#multi-action-cmt').on("submit", function(e){
            e.preventDefault();

            var action = $("button[type=submit][clicked=true]").val();
            var route = $(this).attr('action');
            var type = 'all';

            var ids = $(this).find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            // console.log(ids);
            $.ajax({
                url: route,
                type: 'GET',
                data: {action: action, id: ids, type: type},
            })
            .done(function(data) {
                // console.log(data);
                $("#ajax-table-admin-user").html(data);
            })
            .fail(function() {
                console.log("error");
            });
            
        });

        $("#multi-action-cmt input:checkbox").on('click', function(event) {
            var checkbox_selected_count = $("#multi-action-cmt input:checkbox:checked").length;
            // console.log(checkbox_selected_count);
            if (checkbox_selected_count > 0) {
                $('#multi-action-cmt button[type=submit]').removeClass('checkbox-selected');
                $('#multi-action-cmt button[type=submit]').removeAttr('disabled');
            } else {
                $('#multi-action-cmt button[type=submit]').addClass('checkbox-selected');
                $('#multi-action-cmt button[type=submit]').attr('disabled', 'disabled');
            }
        });
        
    });
    
</script>