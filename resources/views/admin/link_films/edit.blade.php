@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa Link Phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Phim</a></li>
      <li class="active">Danh Sách Link Phim</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        @include('admin.error.errror')
          <!-- form start -->
          <form role="form" action="{{route('admin.link.update',['id'=>$links->id])}}" method="post">
            {{ csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
             {{--  <div class="form-group">
                <label>Chọn Tên Phim</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Tranfomer</option>
                  <option>Naruto shipupen</option>
                  <option>Những Người Cùng Khổ</option>
                  <option>Hoạt Hình</option>
                  <option>Kinh Dị</option>
                  <option>Phiêu Lưu</option>
                </select>
              </div> --}}
              <div class="form-group">
                <label>Chọn loại</label>
                <select class="form-control select2 select2-hidden-accessible" name="txttypelink" id="txttypelink" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="1" {{ old('txttypelink',$links->type) == 1  ? 'selected' : ''}} >Link Trailer</option>
                  <option value="2" {{ old('txttypelink',$links->type)  == 2 ? 'selected' : ''}} >Link Download</option>
                  <option value="3" {{ old('txttypelink',$links->type) == 3 ? 'selected' : ''}} >Link Xem</option>
                </select>
              </div>
              <div class="form-group">
                <label for="description">Nhập Mô Tả</label>
                <textarea name="description" class="form-control" id="description" rows="5">{{$links->description}}
                </textarea>
              </div>
              <div class="form-group">
                <label for="txtLink">Nhập Link</label>
                <input type="text"  class="form-control"  {{old('txtLink')}} name="txtlink" id="txtLink" value="{{ $links ->link }}">

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection