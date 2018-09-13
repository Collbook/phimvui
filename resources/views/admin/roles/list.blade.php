@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">
    
    @endsection

    <!-- Content Wrapper. Contains page content -->
    <div id="ajax-table-role"">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Danh sách quyền quản trị</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Danh sách quyền quản trị</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row m-2" style="background-color: #fff;">
                    <div class="col-lg-12">
                        <br>
                        <label class="delete-user-success mess-success-hide bg-primary">Chúc mừng. Bạn đã xóa thành công.</label>
                        <a class="btn btn-info" href="#" style="float: right;margin-right: 10px;" data-toggle="modal" data-target="#addRole"><i class="fa fa-plus"></i> Thêm quyền quản trị mới</a>
                        
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
                                <div  id="multi-action-admin">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên quyền</th>
                                                <th>Slug</th>
                                                <th>Mô tả</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0 ?>
                                        <?php foreach ($roles as $role): ?>
                                        <?php $i++ ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $role->name }}</td>

                                                <td>{{ $role->slug }}</td>

                                                <td>{{ $role->description }}</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#editModal{{ $role->id }}"><span class="btn btn-warning btn-sm button-action">Sửa</span></a><br>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal{{ $role->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên quyền</th>
                                                <th>Slug</th>
                                                <th>Mô tả</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- ./wrapper -->
                    </div>
                </div>
            </section>

            {{-- Modal khi thêm quyền quản trị mới --}}
            <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" style="padding-left: 30px;">Thêm quyền quản trị mới</h3>
                        </div>
                        <br>
                        <form action="{{ route('admin.role.store') }}" method="POST" role="form" id="addNewRole">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="form-group">
                                        <label for="name">Tên quyền</label>
                                        <input name="name" type="text" class="form-control" placeholder="Nhập tên quyền quản trị">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <input name="description" type="text" class="form-control" placeholder="Mô tả quyền quản trị viên" required>
                                    </div>

                                    <button type="reset" class="btn btn-default">Hủy</button>
                                    <button type="submit" id="button" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </div>
                            <br>
                        </form> 
                    </div>
                </div>
            </div>

            <?php foreach ($roles as $role): ?>
            
            {{-- Modal for edit role --}}
            <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="padding-left: 30px;">Sửa thông tin quyền quản trị</h4>
                        </div>
                        <br>
                        <div id="load-form-add-role">
                            <form action="{{ route('admin.role.update', [$role->id]) }}" method="POST" role="form" id="editRole{{ $role->id }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="form-group">
                                            <label for="name">Tên quyền</label>
                                            <input name="name" type="text" class="form-control" value="{{ $role->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Mô tả</label>
                                            <input name="description" type="text" class="form-control" value="{{ $role->description }}" required>
                                        </div>

                                        <button type="reset" class="btn btn-default">Hủy</button>
                                        <button type="submit" id="button{{ $role->id }}" class="btn btn-primary">Xác nhận</button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>

            {{-- Modal for delete Role --}}
            <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.role.destroy', [$role->id]) }}" method="POST" role="form" id="deleteRole{{ $role->id }}">
                            {{ csrf_field() }}
                            <div style="padding: 15px;">
                                <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn xóa quyền này?</h4>
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
                                <button class="btn btn-danger" type="submit">Xóa quyền quản trị</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>    

    @section('body.script')

    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>

    @include('admin.roles.js')

    @endsection

@endsection