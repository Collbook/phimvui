<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if (!empty(Auth::guard('admin')->user()->avatar)): ?>
                    <img src="{{ asset('storage/admins/' . Auth::guard('admin')->id() . '/' . Auth::guard('admin')->user()->avatar) }}" class="user-image">
                <?php else: ?>
                    <i class="fa fa-image" style="font-size:18px;color:#fff"></i>
                <?php endif ?>
                    <span class="hidden-xs">{{ Auth::guard('admin')->user()->fullname }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                    <?php if (!empty(Auth::guard('admin')->user()->avatar)): ?>
                        <img src="{{ asset('storage/admins/' . Auth::guard('admin')->id() . '/' . Auth::guard('admin')->user()->avatar) }}" class="user-image">
                    <?php else: ?>
                        <i class="fa fa-image" style="font-size:18px;color:#fff"></i>
                    <?php endif ?>

                        <p>
                            {{ Auth::guard('admin')->user()->fullname }}
                            <small>Tham gia {{ Auth::guard('admin')->user()->created_at->toFormattedDateString('Asia/Ho_Chi_Minh') }}</small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('admin.profile.index') }}" class="btn btn-default btn-flat">Hồ sơ</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Thoát</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>