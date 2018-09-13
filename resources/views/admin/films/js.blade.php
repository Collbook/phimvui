<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Xac nhan multi delete user
        $('form#multiActiveSlide').on("submit", function(e){
            e.preventDefault();
            var route    = $(this).attr('action');
            var method   = $(this).attr('method');
            var ids = $('div#multi-active-slide').find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            if(ids.length==0){
                ids=[0];
            }
//            console.log(ids);
            $.ajax({
                url: route,
                type: method,
                data: {id: ids}
            })
            .done(function(data) {
//                 console.log(data);
                    $("#ajax-table-phim").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div#multiActiveSlideCheckBox').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                $('label.active-slide-success').removeClass('mess-success-hide');
                var $rows = $("label.active-slide-success");
                    setTimeout(function() {
                        $rows.addClass("mess-success-hide");
                    }, 3000);
            })
            .fail(function() {
                console.log("error");
            });
        });
    });
</script>