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