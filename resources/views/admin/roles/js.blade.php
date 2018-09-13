<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // <============================================================================================>
        // Ajax for add new admin user
        $("form#addNewRole").on('submit', function(event) {
            event.preventDefault();
            var route       = $(this).attr('action');
            var method      = $(this).attr('method');
            var name        = $(this).find("input[name='name']").val();
            var description = $(this).find("input[name='description']").val();
            console.log(method);
            $.ajax({
                url: route,
                type: method,
                data: {name: name, description: description},
            })
            .done(function(data) {
                // console.log(data);
                $("#ajax-table-role").html(data);
                $('body').removeClass('modal-open');
                $('body').removeAttr('style');
                $('#addRole').modal('hide');
                $('.modal-backdrop').remove();
                
            })
            .fail(function() {
                console.log("error");
            });
        });


        // <============================================================================================>
        <?php foreach ($roles as $role): ?>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // <============================================================================================>
            // Ajax for Edit User
            $("form#editRole{{ $role->id }}").on('submit', function(event) {
                event.preventDefault();
                var route       = $(this).attr('action');
                var method      = $(this).attr('method');
                var name        = $(this).find("input[name='name']").val();
                var description = $(this).find("input[name='description']").val();
                // console.log(description);
                $.ajax({
                    url: route,
                    type: method,
                    data: {name: name, description: description},
                })
                .done(function(data) {
                    console.log(data);
                    $("#ajax-table-role").html(data);
                    $('div#editModal{{ $role->id }}').removeClass('in').modal('hide');
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('.modal-backdrop').remove();
                })
                .fail(function() {
                    console.log("error");
                });
            });

            // <============================================================================================>
            // Ajax for Delete Role
            $("form#deleteRole{{ $role->id }}").on('submit', function(event) {
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
                    console.log(data);
                    if (data == 0) {
                        // console.log("Mat khau khong dung");
                        $('label.mess-error').removeClass('mess-error-hide');
                    } else {
                        $("#ajax-table-role").html(data);
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        $('div#deleteModal{{ $role->id }}').removeClass('in').modal('hide');
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