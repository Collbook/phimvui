<script>
    $(document).ready(function() {

        // <===============================================================================================>
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

        // <===============================================================================================>
        // Muliple action Ajax (Approve and Delete Films)
        $('form#multi-action').on("submit", function(e){
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
                $("#ajax-table-new-film").html(data);
            })
            .fail(function() {
                console.log("error");
            });
            
        });

        // <===============================================================================================>
        <?php foreach ($films as $film): ?>
            // Ajax for Approve Film
            $("a#approve{{ $film->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id = {{ $film->id }};
                $.ajax({
                    url: href,
                    data: {id: id},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-new-film").html(data);
                    $('body').removeClass('modal-open');
                    $('div#approveModal{{ $film->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });

            // <===============================================================================================>
            // Ajax for Delete Film
            $("a#deletefilm{{ $film->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id = {{ $film->id }};
                $.ajax({
                    url: href,
                    data: {id: id},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-new-film").html(data);
                    $('body').removeClass('modal-open');
                    $('div#deleteModal{{ $film->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });
        <?php endforeach ?>  
    });
    
</script>