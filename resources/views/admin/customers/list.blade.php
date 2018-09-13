@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- DatePicker -->
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">

    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">
    
    @endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Dánh sách khách đăng ký</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách khách đăng ký</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row m-2" style="background-color: #fff;">
                <div class="col-lg-12">
                    <br>
                    <label class="delete-user-success mess-success-hide bg-primary">Chúc mừng. Bạn đã xóa thành công.</label>
                    
                </div>

                <div class="col-lg-12">
                    <hr>
                    <!-- Content Wrapper. Contains page content -->
                    <div  id="ajax-table-admin-user">
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
                                            <th class="check-all">Lựa chọn</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Trạng thái</th>
                                            <th>Avatar</th>
                                            <th>Khóa đến</th>
                                            <th>Email</th>
                                            <th>Họ tên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($customers as $customer): ?>
                                        <tr>
                                            <td>
                                                <label class="container1">
                                                    <input type="checkbox" class=" check-comment" name="id[]" value="{{ $customer->id }}"> 
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.customer.show', [$customer->username]) }}">{{ $customer->username }}</a>
                                            </td>
                                            <td>
                                            <?php if ($customer->status == 1): ?>
                                                <span class="label label-primary">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Đang tạm khóa</span>
                                            <?php endif ?>
                                            </td>
                                            <td>
                                            <?php if (!empty($customer->avatar)): ?>
                                                <img src="{{ asset('storage/customers/' . $customer->id . '/' . $customer->avatar) }}" alt="Avatar" width="60px">
                                            <?php else: ?>
                                                <img src="{{ asset("img/no_image_thumb.jpg") }}" alt="Image" class="user-img" width="90px">
                                            <?php endif ?>
                                                
                                            </td>
                                            <td>{{ $customer->time_lock_end }}</td>
                                            <td>
                                                <a href="{{ route('admin.customer.show', [$customer->username]) }}">{{ $customer->email }}</a>
                                            </td>
                                            <td>{{ $customer->fullname }}</td>
                                            <td>
                                            <?php if ($customer->status == 1): ?>
                                                <a href="#" data-toggle="modal" data-target="#lockModal{{ $customer->id }}"><span class="btn btn-warning btn-sm button-action">Khóa</span></a><br>
                                            <?php else: ?>
                                                <a href="#" data-toggle="modal" data-target="#unlockModal{{ $customer->id }}"><span class="btn btn-info btn-sm button-action">Mở khóa</span></a><br>
                                            <?php endif ?>
                                                <a href="{{ route('admin.customer.show', [$customer->username]) }}"><span class="btn btn-info btn-sm button-action">Xem</span></a><br>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $customer->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="check-all">
                                                Lựa chọn
                                            </th>
                                            <th>Tên đăng nhập</th>
                                            <th>Trạng thái</th>
                                            <th>Avatar</th>
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


        {{-- Modal khi xoa nhieu tai khoan cung luc --}}
        <div class="modal fade" id="multiDeleteAdminCheckBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 30px;">Xóa khách đăng nhập</h3>
                    </div>
                    <br>
                    <form action="{{ route('admin.customer.multi.delete.customer') }}" method="GET" role="form" id="multiDeleteAdmin">
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
                        <h3 class="modal-title" style="padding-left: 30px;">Mở khóa khách đăng nhập</h3>
                    </div>
                    <br>
                    <form action="{{ route('admin.customer.multi.unlock.customer') }}" method="GET" role="form" id="multiUnlockAdmin">
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
        
        <?php foreach ($customers as $customer): ?>
        <!-- Modal lock User -->
        <div class="modal fade" id="lockModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $customer->id }}" aria-hidden="true" class="lockuserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $customer->id }}">Bạn chắc chắn khóa tài khoản khách đăng nhập <strong>{{ $customer->email }}</strong>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.customer.lock', [$customer->id]) }}" method="GET" role="form" id="lockuser{{ $customer->id }}">
                        {{ csrf_field() }}

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Khóa đến ngày</label>
                                <input type="text" name="time_lock_end" class="form-control" required id="time_lock_end{{ $customer->id }}" placeholder="Vui lòng chọn khóa tài khoản đến ngày">
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
        <div class="modal fade" id="unlockModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $customer->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="padding: 15px;">
                        <h4 class="modal-title">Bạn chắc chắn mở khóa tài khoản khách đăng nhập <strong>{{ $customer->username }}</strong>?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <a href="{{ route('admin.customer.unlock', [$customer->id]) }}" id="unlockuser{{ $customer->id }}"><span class="btn btn-success">Mở khóa tài khoản</span></a>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- Modal for delete Admin User --}}
        <div class="modal fade" id="deleteModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.customer.destroy', [$customer->id]) }}" method="POST" role="form" id="deleteUser{{ $customer->id }}">
                        {{ csrf_field() }}
                        <div style="padding: 15px;">
                            <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn xóa tài khoản của thành viên <strong>{{ $customer->username }}</strong>?</h4>
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

    @section('body.script')

    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>

    @include('admin.customers.js')

    @endsection

@endsection