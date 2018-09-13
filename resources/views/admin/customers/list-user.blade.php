
    <!-- DatePicker -->
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">

    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">


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
                            <img src="{{ asset('storage/customers/' . $customer->id . '/' . $customer->avatar) }}" alt="Avatar" width="60px">
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

    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>

  



