$(document).ready(function() {

    // Validation ChangePassword Form
    $("#addAccount").validate({
        rules: {
            username: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#inputPassword"
            },
            fullname: "required",
            avatar: "required",
            birthday: "required",
        },
        messages: {
            username: "Vui lòng nhập tên tài khoản đăng nhập",
            email: {
                required: "Vui lòng nhập email đăng ký",
                email: "Email không hợp lệ"
            },
            password: {
                required: "Vui lòng nhập mật khẩu đăng nhập",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
            },
            confirm_password: {
                required: "Vui lòng nhập lại mật khẩu đăng nhập",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                equalTo: 'Mật khẩu không trùng nhau'
            },
            fullname: "Vui lòng nhập họ tên của bạn",
            avatar: "Vui lòng chọn ảnh đại diện",
            birthday: "Vui lòng chọn ngày sinh của bạn",
        }
    });

    // Hidden Flash Error
    $("body").on('click', function(event) {
        $("div.alert-danger").hide();
        $("div.alert-success").hide();
    });

    
});