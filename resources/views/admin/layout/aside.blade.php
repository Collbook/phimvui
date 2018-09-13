<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
             <div class="pull-left image">
            <?php if (!empty(Auth::guard('admin')->user()->avatar)): ?>
                <img src="{{ asset('storage/admins/' . Auth::guard('admin')->id() . '/' . Auth::guard('admin')->user()->avatar) }}" class="img-circle">
            <?php else: ?>
                <i class="fa fa-image" style="font-size:18px;color:#fff"></i>
            <?php endif ?>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('admin')->user()->fullname }}</p>
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-film" style="color: #dd4b39"></i>
                    <span>Quản Lý Phim</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.phim.add')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Phim</a>
                    </li>
                    <li>
                        <a href="{{route('admin.phim.index')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Phim</a>
                    </li>
                </ul>
            </li>
            
        @if(Auth::guard('admin')->user()->can('quan-ly-danh-muc-phim'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open-o" style="color: #dd4b39"></i>
                    <span>Quản Lý Chuyên Mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.cate.create')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Chuyên Mục </a>
                    </li>
                    <li>
                        <a href="{{route('admin.cate.list')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Chuyên Mục </a>
                    </li>
                </ul>
            </li>
        @endif
            
        @if(Auth::guard('admin')->user()->can('quan-ly-cac-danh-muc-khac'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link" style="color: #dd4b39"></i>
                    <span>Quản Lý Link Phim</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.link.add')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Link Phim </a>
                    </li>
                    <li>
                        <a href="{{route('admin.link.index')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i>Danh Sách Link Phim</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tag" style="color: #dd4b39"></i>
                    <span>Quản Lý Thẻ Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.tags.add')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Thẻ Tags </a>
                    </li>
                    <li>
                        <a href="{{route('admin.tags.index')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Thẻ Tags </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-flag" style="color: #dd4b39"></i>
                    <span>Quản Lý Quốc Gia</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.country.add')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Quốc Gia </a>
                    </li>
                    <li>
                        <a href="{{route('admin.country.index')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Quốc Gia </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-language" style="color: #dd4b39"></i>
                    <span>Quản Lý Ngôn Ngữ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.language.create')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Ngôn Ngữ Phim </a>
                    </li>
                    <li>
                        <a href="{{route('admin.language.list')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Ngôn Ngữ Phim </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus" style="color: #dd4b39"></i>
                    <span>Quản Lý Diễn Viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.actor.create')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Diễn Viên</a>
                    </li>
                    <li>
                        <a href="{{route('admin.actor.list')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Diễn Viên </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus" style="color: #dd4b39"></i>
                    <span>Quản Lý Đạo Diễn</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('admin.director.create')}}"><i class="fa fa-plus-circle" style="color: #5352ed" aria-hidden="true"></i>Thêm Đạo Điễn </a>
                    </li>
                    <li>
                        <a href="{{route('admin.director.list')}}"><i class="fa fa-list" style="color: #2ed573" aria-hidden="true"></i> Danh Sách Đạo Diễn </a>
                    </li>
                </ul>
            </li>
        @endif    
        
        @if(Auth::guard('admin')->user()->can('quan-ly-thanh-vien-quan-tri'))
            <li class="">
                <a href="{{ route('admin.admin.index') }}">
                    <i class="fa fa-users" style="color: #dd4b39"></i>
                    <span>Quản Lý Thành Viên</span>
                </a>
            </li>
        @endif    
        
        @if(Auth::guard('admin')->user()->can('quan-ly-khach-dang-nhap'))
            <li class="">
                <a href="{{ route('admin.customer.index') }}">
                    <i class="fa fa-users" style="color: #dd4b39"></i>
                    <span>Quản Lý Khách Hàng</span>
                </a>
            </li>
        @endif

        @if(Auth::guard('admin')->user()->can('quan-ly-binh-luan'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comment" style="color: #dd4b39"></i>
                     <span>Quản Lý Bình Luận</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.comment.list.newcomment') }}"><i class="fa fa-check" style="color: #2ed573"></i> Các bình luận mới </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.comment.index') }}"><i class="fa fa-list" style="color: #2ed573"></i> Tất cả bình luận </a>
                    </li>
                </ul>
           </li>
        @endif

        @if(Auth::guard('admin')->user()->can('quan-ly-thanh-vien-quan-tri'))
            <li class="">
                <a href="{{ route('admin.role.index') }}">
                    <i class="fa fa-users" style="color: #dd4b39"></i>
                    <span>Phân quyền quản trị</span>
                </a>
            </li>
        @endif
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user" style="color: #dd4b39"></i>
                    <span>Hồ sơ cá nhân</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.profile.index') }}"><i class="fa fa-user-circle-o" style="color:orange"></i> Hồ sơ</a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out" style="color:orange"></i> Thoát</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
