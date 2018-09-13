
<h3>Kích hoạt tài khoản quản trị</h3>

Chào bạn <strong>{{ $fullname }}</strong>.

<p>Chúng tôi xin thông báo đến với bạn <strong>{{ $fullname }}</strong>. Chào mừng bạn đến với gia đình Phimvui.net</p>
<p>Vui lòng liên kết theo đường link bên dưới để xác thực tài khoản quản trị.</p>
<code>Tài khoản đăng nhập của bạn là: {{ $email }}</code>
<code>Mật khẩu đăng nhập là: {{ $email }}</code><br>
<a href="{{ route('admin.add.account', [$email_token]) }}">Vào trang quản lý</a>

<p>Trân trọng!</p>