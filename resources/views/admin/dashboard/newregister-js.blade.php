<script>
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
            })
        });

        // <=========================== Multipe Delete and unlock User =============================>


        // Xac nhan multi delete user
        $('form#multiDeleteAdmin').on("submit", function(e){
            e.preventDefault();

            var route    = $(this).attr('action');
            var password = $(this).find('input[name="password"]').val();
            var type     = 'new';

            var ids = $('div#multi-action-admin').find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            // console.log(ids);
            $.ajax({
                url: route,
                type: 'GET',
                data: {id: ids, password: password, type: type},
            })
            .done(function(data) {
                // console.log(data);
                if (data == 0) {
                    console.log("Mat khau khong dung");
                    $('label.mess-error').removeClass('mess-error-hide');
                } else {
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('div#multiDeleteAdminCheckBox').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                    $('label.delete-user-success').removeClass('mess-success-hide');
                    var $rows = $("label.delete-user-success");

                    setTimeout(function() {
                        $rows.addClass("mess-success-hide");
                    }, 5000);
                }
            })
            .fail(function() {
                console.log("error");
            });
            
        });

        // <============================================================================================>
        // Xac nhan multi unlock user
        $('form#multiUnlockAdmin').on("submit", function(e){
            e.preventDefault();

            var route    = $(this).attr('action');
            var password = $(this).find('input[name="password"]').val();
            var type     = 'new';

            var ids = $('div#multi-action-admin').find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            // console.log(ids);
            $.ajax({
                url: route,
                type: 'GET',
                data: {id: ids, password: password, type: type},
            })
            .done(function(data) {
                // console.log(data);
                if (data == 0) {
                    console.log("Mat khau khong dung");
                    $('label.mess-error').removeClass('mess-error-hide');
                } else {
                    console.log("Success");
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('div#multiUnlockAdminCheckBox').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                    $('label.delete-user-success').removeClass('mess-success-hide');
                    
                    var $rows = $("label.delete-user-success");

                    setTimeout(function() {
                        $rows.addClass("mess-success-hide");
                    }, 5000);
                }
            })
            .fail(function() {
                console.log("error");
            });
            
        });
        
        <?php foreach ($customers as $customer): ?>
        // Datepickher for lock user
            $( function() {
                $( "#time_lock_end{{ $customer->id }}" ).datepicker({ minDate: 1 });
                $( "#time_lock_end{{ $customer->id }}" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
            });
            $("#ui-datepicker-div").css({
                top: '170px',
                position: 'relative',
            });
        <?php endforeach ?>

        <?php foreach ($customers as $customer): ?>
            // Ajax for Lock User
            $("form#lockuser{{ $customer->id }}").on('submit', function(event) {
                event.preventDefault();
                var route         = $(this).attr('action');
                var time_lock_end = $(this).find("input[name='time_lock_end']").val();
                var type          = 'new';
                $.ajax({
                    url: route,
                    data: {time_lock_end: time_lock_end, type: type},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('div#lockModal{{ $customer->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });


            // Ajax for UnLock User
            $("a#unlockuser{{ $customer->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id   = {{ $customer->id }};
                var type = 'new';
                $.ajax({
                    url: href,
                    data: {id: id, type: type},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('div#unlockModal{{ $customer->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });


            // Ajax for Delete User
            $("form#deleteUser{{ $customer->id }}").on('submit', function(event) {
                event.preventDefault();
                var route    = $(this).attr('action');
                var password = $(this).find("input[name='password']").val();
                var type     = 'new';
                // console.log(level);
                // console.log(route);
                $.ajax({
                    url: route,
                    type: 'GET',
                    data: {password: password, type: type},
                })
                .done(function(data) {
                    // console.log(data);
                    if (data == 0) {
                        console.log("Mat khau khong dung");
                        $('label.mess-error').removeClass('mess-error-hide');
                    } else {
                        $("#ajax-table-admin-user").html(data);
                        $('body').removeClass('modal-open');
                        $('div#deleteModal{{ $customer->id }}').removeClass('in').modal('hide');
                        $('.modal-backdrop').remove();
                        $('label.delete-user-success').removeClass('mess-success-hide');
                        var $rows = $("label.delete-user-success");

                        setTimeout(function() {
                            $rows.addClass("mess-success-hide");
                        }, 5000);
                    }
                })
                .fail(function() {
                    console.log("error");
                });
            });

        <?php endforeach ?>  
    });
    
</script>