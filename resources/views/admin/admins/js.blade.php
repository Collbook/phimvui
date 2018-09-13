<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // <============================================================================================>
        // Ajax for add new admin user
        $("form#addNewAdminUser").on('submit', function(event) {
            event.preventDefault();
            var route    = $(this).attr('action');
            var method   = $(this).attr('method');
            var email    = $("input[name='email']").val();
            var fullname = $("input[name='fullname']").val();
            $.ajax({
                url: route,
                type: method,
                data: {email: email, fullname: fullname},
            })
            .done(function(data) {
                // console.log(data);
                $("#ajax-table-admin-user").html(data);
                $('body').removeClass('modal-open');
                $('body').removeAttr('style');
                $('#addAdmin').modal('hide');
                $('.modal-backdrop').remove();
                
            })
            .fail(function() {
                console.log("error");
            });
        });

        // <============================================================================================>
        // Xac nhan multi delete user
        $('form#multiDeleteAdmin').on("submit", function(e){
            e.preventDefault();

            var route    = $(this).attr('action');
            var method   = $(this).attr('method');
            var password = $(this).find('input[name="password"]').val();

            var ids = $('div#multi-action-admin').find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            // console.log(ids);
            $.ajax({
                url: route,
                type: method,
                data: {id: ids, password: password},
            })
            .done(function(data) {
                // console.log(data);
                if (data == 0) {
                    console.log("Mat khau khong dung");
                    $('label.mess-error').removeClass('mess-error-hide');
                } else {
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
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
            var method   = $(this).attr('method');
            var password = $(this).find('input[name="password"]').val();

            var ids = $('div#multi-action-admin').find("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            // console.log(ids);
            $.ajax({
                url: route,
                type: method,
                data: {id: ids, password: password},
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
                    $('body').removeAttr('style');
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
        
        // <============================================================================================>
        <?php foreach ($admins as $admin): ?>
        // Datepickher for lock user
            $( function() {
                $( "#time_lock_end{{ $admin->id }}" ).datepicker({ minDate: 1 });
                $( "#time_lock_end{{ $admin->id }}" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
            });
            $("#ui-datepicker-div").css({
                top: '170px',
                position: 'relative',
            });
        <?php endforeach ?>

        // <============================================================================================>
        <?php foreach ($admins as $admin): ?>
            // Ajax for Lock User
            $("form#lockuser{{ $admin->id }}").on('submit', function(event) {
                event.preventDefault();
                var route         = $(this).attr('action');
                var method        = $(this).attr('method');
                var time_lock_end = $(this).find("input[name='time_lock_end']").val();
                $.ajax({
                    url: route,
                    type: method,
                    data: {time_lock_end: time_lock_end},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div#lockModal{{ $admin->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });

            // <============================================================================================>
            // Ajax for UnLock User
            $("a#unlockuser{{ $admin->id }}").on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var id = {{ $admin->id }};
                $.ajax({
                    url: href,
                    data: {id: id},
                })
                .done(function(data) {
                    // console.log(data);
                    $("#ajax-table-admin-user").html(data);
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div#unlockModal{{ $admin->id }}').removeClass('in').modal('hide');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });

            // <============================================================================================>
            // Ajax for Delete User
            $("form#deleteUser{{ $admin->id }}").on('submit', function(event) {
                event.preventDefault();
                var route    = $(this).attr('action');
                var method   = $(this).attr('method');
                var password = $(this).find("input[name='password']").val();
                // console.log(level);
                // console.log(route);
                $.ajax({
                    url: route,
                    type: method,
                    data: {password: password},
                })
                .done(function(data) {
                    // console.log(data);
                    if (data == 0) {
                        // console.log("Mat khau khong dung");
                        $('label.mess-error').removeClass('mess-error-hide');
                    } else {
                        $("#ajax-table-admin-user").html(data);
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        $('div#deleteModal{{ $admin->id }}').removeClass('in').modal('hide');
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
            // Ajax for Edit User
            $("form#edituser{{ $admin->id }}").on('submit', function(event) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                event.preventDefault();
                var route    = $(this).attr('action');
                var method   = $(this).attr('method');
                var password = $(this).find("input[name='password']").val();
                var level    = $(this).find("input[name='level']:checked").val();
                var ids      = $(this).find("input:checkbox:checked").map(function(){
                return $(this).val();
                }).get();

                var ids_length = ids.length;

                // console.log(ids_length);       

                $.ajax({
                    url: route,
                    type: method,
                    data: {id: ids, password: password, level: level, ids_length: ids_length},
                })
                .done(function(data) {
                    console.log(data);
                    if (data == 0) {
                        console.log("Mat khau khong dung");
                        $('label.mess-error').removeClass('mess-error-hide');
                    } else {
                        $("#ajax-table-admin-user").html(data);
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        $('div#editModal{{ $admin->id }}').removeClass('in').modal('hide');
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