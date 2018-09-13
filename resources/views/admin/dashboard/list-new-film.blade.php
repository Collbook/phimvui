
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
        <form action="{{ route('admin.phim.multi.checkbox.postfilm') }}" method="GET" id="multi-action">
            {{ csrf_field() }}
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Lựa chọn</th>
                        <th>Tên phim</th>
                        <th>Năm sản xuất</th>
                        <th>Avatar</th>
                        <th>Người đăng</th>
                        <th>Ngày đăng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td>
                            <label class="container1">
                                <input type="checkbox" class="check-comment" name="id[]" value="{{ $film->id }}"> 
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <a href="{{ route('admin.phim.show', [$film->slug]) }}">{{ $film->title_vi }}</a>
                        </td>

                        <td>{{ $film->published_year }}</td>

                        <td>
                        @if(!empty($film->img_thumbnail) && file_exists(public_path(get_thumbnail("assets/frontend/images/".$film->img_thumbnail))))
                            <img src="{{ asset("assets/frontend/images/".get_thumbnail($film->img_thumbnail)) }}" alt="Image" width="60px">
                        @else
                            <img src="{{ asset("img/no_image_thumb.jpg") }}" alt="Image" width="60px" height="60px">
                        @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('admin.admin.show', [$film->admins->username]) }}">{{ $film->admins->username }}</a>
                        </td>
                        <td>{{ $film->created_at }}</td>
                        <td>
                        <?php if ($film->status == 0): ?>
                            <a href="#" data-toggle="modal" data-target="#approveModal{{ $film->id }}"><span class="btn btn-warning btn-sm button-action">Duyệt</span></a><br>
                        <?php endif ?>
                            <a href="{{ route('admin.phim.show', [$film->slug]) }}"><span class="btn btn-info btn-sm button-action">Xem</span></a><br>
                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $film->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Lựa chọn</th>
                        <th>Tên phim</th>
                        <th>Năm sản xuất</th>
                        <th>Avatar</th>
                        <th>Người đăng</th>
                        <th>Ngày đăng</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
            </table>
            
            <button type="submit" name="action" value="approve" class="btn btn-sm btn-success checkbox-selected" disabled style="margin-right: 30px">Duyệt phim</button>
            <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger checkbox-selected" disabled>Xóa phim</button>
        </form>    
    </div>

    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>

  



