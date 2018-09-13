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