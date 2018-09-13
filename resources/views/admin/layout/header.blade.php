<header class="main-header">
    <!-- Logo -->
    <a class="navbar-brand logo" href="{{ route('home') }}" target="_blank">
    	<img src="{{asset('assets/frontend/images/logo-top.png')}}" alt="Phim Vui">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    @include('admin.layout.menu')
</header>