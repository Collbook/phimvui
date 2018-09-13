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

    // Validation ChangePassword Form
    $("#changepasswordForm").validate({
        rules: {
            old_password: "required",
            new_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#inputNewPassword"
            }
        },
        messages: {
            old_password: "Vui lòng nhập mật khẩu cũ",
            new_password: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Mật khẩu tối thiểu 6 ký tự"
            },
            confirm_password: {
                required: "Vui lòng nhập lại mật khẩu mới",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                equalTo: 'Mật khẩu không trùng nhau'
            }
        }
    });

    // Enable/Disable Button Update Profile Submit
    $('#updateForm input').bind('keyup blur click change', function () {
        if ($('#updateForm').validate().checkForm()) {
            $('#update-profile').removeClass('button_disabled').prop('disabled', false);
        } else {
            $('#update-profile').addClass('button_disabled').prop('disabled', true);
            $('.not-check-user').addClass('hide-error');
            $('.check-user').addClass('hide-error');
            $('.not-check-email').addClass('hide-error');
            $('.check-email').addClass('hide-error');
        };
        if ($("label.error").hasClass('not-check-user')) {
            console.log('1');
            // $('#update-profile').addClass('button_disabled').prop('disabled', true);
        }
    });

    // Validation ChangePassword Form
    var validator = $("#updateForm").validate({

        rules: {
            username: "required",
            email: {
                required: true,
                email: true
            },
            fullname: {
                required: true,
            },
            birthday: {
                required: true,
            }
        },
        messages: {
            username: "Vui lòng nhập tên đăng nhập",
            email: {
                required: "Vui lòng nhập email của bạn",
                email: "Email không hợp lệ"
            },
            fullname: {
                required: "Vui lòng nhập tên của bạn"
            },
            birthday: {
                required: "Vui lòng nhập ngày sinh của bạn"
            }
        }
    });

    // Enable/Disable Button ChangePassword Submit
    $('#changepasswordForm input').bind('keyup blur click', function () {
        if ($('#changepasswordForm').validate().checkForm()) {
            $('#change-password').removeClass('button_disabled').prop('disabled', false);
        } else {
            $('#change-password').addClass('button_disabled').prop('disabled', true);
        }
    });

    // Hidden Flash Error
    $("body").on('click', function(event) {
        $("div.alert-danger").hide();
        $("div.alert-success").hide();
    });
    
});