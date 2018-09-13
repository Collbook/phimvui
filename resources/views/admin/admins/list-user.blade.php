
    <!-- DatePicker -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">
    
    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Danh sách quản trị viên</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách quản trị viên</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row m-2" style="background-color: #fff;">
                <div class="col-lg-12">
                    <br>
                    <label class="delete-user-success mess-success-hide bg-primary">Chúc mừng. Bạn đã cấp quyền thành công.</label>
                    
                    @if (Auth::guard('admin')->user()->can('them-phim-moi'))
                        <a class="btn btn-info" href="#" style="float: right;margin-right: 10px;" data-toggle="modal" data-target="#addAdmin"><i class="fa fa-plus"></i> Thêm quản trị viên mới</a>
                    @endif
                    
                </div>

                <div class="col-lg-12">
                    <hr>
                    <!-- Content Wrapper. Contains page content -->
                    <div>
                        @if (session('status_checkbox'))
                            <div class="box-header">
                                <span class="bg-danger click-to-hidden center-block" style="padding: 10px;">{{ session('status_checkbox') }}</span>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="multi-action-admin">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Lựa chọn</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Cấp bậc</th>
                                            <th>Kích hoạt</th>
                                            <th>Số lượng phim đã đăng</th>
                                            <th>Avatar</th>
                                            <th>Trạng thái</th>
                                            <th>Khóa đến</th>
                                            <th>Email</th>
                                            <th>Họ tên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($admins as $admin): ?>
                                        <tr>
                                            <td>
                                                <label class="container1">
                                                    <input type="checkbox" class=" check-comment" name="id[]" value="{{ $admin->id }}"> 
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.admin.show', [$admin->username]) }}">{{ $admin->username }}</a>
                                            </td>
                                            <td>
                                            <?php if ($admin->level == 1): ?>
                                                Quản trị viên
                                            <?php elseif ($admin->level == 2): ?>
                                                Biên tập viên
                                            <?php elseif ($admin->level == 3): ?>
                                                Người kiểm duyệt 
                                            <?php else: ?>
                                                Thành viên mới
                                            <?php endif ?>
                                            </td>

                                            <td>
                                            <?php if ($admin->active == 1): ?>
                                                <span class="label label-success">Đã kích hoạt</span>  
                                            <?php else: ?>
                                                <span class="label label-warning">Chưa kích hoạt</span>
                                            <?php endif ?>
                                            </td>

                                            <td>{{ $admin->films->count() }}</td>
                                            <td>
                                                <?php if (isset($admin->avatar)): ?>
                                                    <img src="{{ asset('storage/admins/' . $admin->id . '/' . $admin->avatar) }}" alt="Avatar" width="60px">
                                                <?php else: ?>
                                                    Chưa cập nhật
                                                <?php endif ?>
                                                
                                            </td>
                                            <td>
                                            <?php if ($admin->status == 1): ?>
                                                <span class="label label-primary">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Đang tạm khóa</span>
                                            <?php endif ?>
                                            </td>
                                            <td>{{ $admin->time_lock_end }}</td>
                                            <td>
                                                <a href="{{ route('admin.admin.show', [$admin->username]) }}">{{ $admin->email }}</a>
                                            </td>
                                            <td>{{ $admin->fullname }}</td>
                                            <td>

                                            {{-- @if (Auth::guard('admin')->user()->can('them-phim-moi')) --}}
                                                <?php if ($admin->status == 1): ?>
                                                <a href="#" data-toggle="modal" data-target="#lockModal{{ $admin->id }}"><span class="btn btn-warning btn-sm button-action">Khóa</span></a><br>
                                                <?php else: ?>
                                                <a href="#" data-toggle="modal" data-target="#unlockModal{{ $admin->id }}"><span class="btn btn-info btn-sm button-action">Mở khóa</span></a><br>
                                                <?php endif ?>
                                                <a href="{{ route('admin.admin.show', [$admin->username]) }}"><span class="btn btn-info btn-sm button-action">Xem</span></a><br>
                                                <a href="#" data-toggle="modal" data-target="#editModal{{ $admin->id }}"><span class="btn btn-warning btn-sm button-action">Sửa</span></a><br>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $admin->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                                            {{-- @endif --}}
                                            
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Lựa chọn</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Cấp bậc</th>
                                            <th>Kích hoạt</th>
                                            <th>Số lượng phim đã đăng</th>
                                            <th>Avatar</th>
                                            <th>Trạng thái</th>
                                            <th>Khóa đến</th>
                                            <th>Email</th>
                                            <th>Họ tên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                                <button name="submit" class="btn btn-sm btn-warning checkbox-selected"  id="multi-unlock-user" data-toggle="modal" data-target="#multiUnlockAdminCheckBox" disabled>Mở khóa tài khoản</button>
                                <button name="submit" class="btn btn-sm btn-danger checkbox-selected" disabled id="multi-delete-user" data-toggle="modal" data-target="#multiDeleteAdminCheckBox">Xóa tài khoản</button>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- ./wrapper -->
                </div>
            </div>
        </section>

        {{-- Modal khi thêm tài khoản quản trị mới --}}
        <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 30px;">Thêm thành viên quản trị mới</h3>
                    </div>
                    <br>
                    <form action="{{ route('admin.admin.store') }}" method="POST" role="form" id="addNewAdminUser">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="form-group">
                                    <label for="fullname">Họ và tên</label>
                                    <input name="fullname" type="text" class="form-control" placeholder="Nhập họ tên quản trị viên">
                                </div>

                                <div class="form-group">
                                    <label for="email">Địa chỉ Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email quản trị viên" required>
                                </div>

                                <button type="reset" class="btn btn-default">Hủy</button>
                                <button type="submit" id="button" class="btn btn-primary">Gửi lời mời</button>
                            </div>
                        </div>
                        <br>
                    </form> 
                </div>
            </div>
        </div>

        {{-- Modal khi xoa nhieu tai khoan cung luc --}}
        <div class="modal fade" id="multiDeleteAdminCheckBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 30px;">Xóa thành viên quản trị</h3>
                    </div>
                    <br>
                    <form action="{{ route('admin.admin.multi.delete.admin') }}" method="POST" role="form" id="multiDeleteAdmin">
                        {{ csrf_field() }}
                        <div style="padding: 15px;">
                            <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn xóa tài khoản của các thành viên này?</h4>
                            <h5 class="text-center text-danger">Vui lòng cân nhắc trước khi xác nhận!</h5>
                        </div>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required>
                                        <label class="mess-error mess-error-hide">Mật khẩu không hợp lệ!</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-danger" type="submit">Xóa tài khoản</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        {{-- Modal khi mo khoa nhieu tai khoan cung luc --}}
        <div class="modal fade" id="multiUnlockAdminCheckBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 30px;">Mở khóa thành viên quản trị</h3>
                    </div>
                    <br>
                    <form action="{{ route('admin.admin.multi.unlock.admin') }}" method="POST" role="form" id="multiUnlockAdmin">
                        {{ csrf_field() }}
                        <div style="padding: 15px;">
                            <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn mở khóa tài khoản của các thành viên này?</h4>
                            <h5 class="text-center text-danger">Vui lòng cân nhắc trước khi xác nhận!</h5>
                        </div>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required>
                                        <label class="mess-error mess-error-hide">Mật khẩu không hợp lệ!</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-danger" type="submit">Mở khóa tài khoản</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        
        <?php foreach ($admins as $admin): ?>
        <!-- Modal lock User -->
        <div class="modal fade" id="lockModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $admin->id }}" aria-hidden="true" class="lockuserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $admin->id }}">Bạn chắc chắn khóa tài khoản quản trị viên <strong>{{ $admin->email }}</strong>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.admin.lock', [$admin->id]) }}" method="POST" role="form" id="lockuser{{ $admin->id }}">
                        {{ csrf_field() }}

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Khóa đến ngày</label>
                                <input type="text" name="time_lock_end" class="form-control" required id="time_lock_end{{ $admin->id }}" placeholder="Vui lòng chọn khóa tài khoản đến ngày">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-dismiss="modal">Hủy</span>
                            <button class="btn btn-primary" type="submit">Khóa tài khoản</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>

        <!-- Modal Unlock User -->
        <div class="modal fade" id="unlockModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $admin->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="padding: 15px;">
                        <h4 class="modal-title">Bạn chắc chắn mở khóa tài khoản quản trị viên <strong>{{ $admin->username }}</strong>?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <a href="{{ route('admin.admin.unlock', [$admin->id]) }}" id="unlockuser{{ $admin->id }}"><span class="btn btn-success">Mở khóa tài khoản</span></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal for edit Admin User --}}
        <div class="modal fade" id="editModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="padding-left: 30px;">Cấp quyền thành viên quản trị <strong>{{ $admin->username }}</strong></h4>
                    </div>
                    <br>
                    <form action="{{ route('admin.admin.update', [$admin->id]) }}" method="POST" role="form" id="edituser{{ $admin->id }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="form-group">
                                    <label>Chức vụ thành viên</label><br>
                                    <label class="radio-inline"><input type="radio" name="level" value="1" <?php if ($admin->level == 1): ?>checked<?php endif ?> >Quản trị</label>
                                    <label class="radio-inline"><input type="radio" name="level" value="2" <?php if ($admin->level == 2): ?>checked<?php endif ?>>Biên tập viên</label>
                                    <label class="radio-inline"><input type="radio" name="level" value="3" <?php if ($admin->level == 3): ?>checked<?php endif ?>>Người kiểm duyệt</label>
                                    <label class="radio-inline"><input type="radio" name="level" value="0" <?php if ($admin->level == 0): ?>checked<?php endif ?>>Thành viên mới</label>
                                </div>

                                <div class="form-group">
                                    <label>Cấp quyền cho thành viên</label><br>
                                    <div class="row">
                                    <?php foreach ($roles as $role): ?>
                                        <div class="col-lg-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" <?php foreach ($admin->roles as $role_checked): ?>
                                                    <?php if ($role->id == $role_checked->id): ?>
                                                        checked
                                                    <?php endif ?>
                                                <?php endforeach ?> name="id[]" value="{{ $role->id }}">{{ $role->name }}
                                            </label>
                                        </div>
                                    <?php endforeach ?>
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required>
                                        <label class="mess-error mess-error-hide">Mật khẩu không hợp lệ!</label>
                                    </div>
                                <hr>
                                <button type="reset" class="btn btn-default">Hủy</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                        <br>
                    </form> 
                </div>
            </div>
        </div>

        {{-- Modal for delete Admin User --}}
        <div class="modal fade" id="deleteModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.admin.destroy', [$admin->id]) }}" method="POST" role="form" id="deleteUser{{ $admin->id }}">
                        {{ csrf_field() }}
                        <div style="padding: 15px;">
                            <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn xóa tài khoản của thành viên <strong>{{ $admin->username }}</strong>?</h4>
                            <h5 class="text-center text-danger">Vui lòng cân nhắc trước khi xác nhận!</h5>
                        </div>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required>
                                        <label class="mess-error mess-error-hide">Mật khẩu không hợp lệ!</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-danger" type="submit">Xóa tài khoản</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

    {{-- DatePicker --}}
    {{-- <script src="{{ asset('js/admin/jquery-ui.js') }}"></script> --}}
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>
    @include('admin.admins.js')

  



