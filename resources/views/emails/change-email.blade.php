
<h3>Thông báo thay đổi email tài khoản quản trị</h3>

Chào bạn <strong>{{ $fullname }}</strong>.

<p>Chúng tôi xin thông báo đến với bạn <strong>{{ $fullname }}</strong>. Chúng tôi nhận được yêu cầu thay đổi email đăng nhập từ bạn</p>
<p>Vui lòng liên kết theo đường link bên dưới để xác nhận tài khoản quản trị.</p>
<a href="{{ route('admin.add.account', [$email_token]) }}">Vào trang quản lý</a>
<br>
<p>Nếu không phải là bạn vui lòng bỏ qua yêu cầu này.</p>

<p>Trân trọng!</p>