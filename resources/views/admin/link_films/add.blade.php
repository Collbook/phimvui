@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nhập Link Phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Phim</a></li>
      <li class="active">Nhập Link Phim</li>
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
          <form role="form" action="{{route('admin.link.add')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label>Chọn Tên Phim</label>
                <select class="form-control select2 select2-hidden-accessible" name="txtname" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  {{--<option selected="selected">Tranfomer</option>--}}
                  @foreach($films as $film)
                    <option value="{{$film->id}}">{{$film->title_vi}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Chọn loại</label>
                <select class="form-control select2 select2-hidden-accessible" name="txttypelink" id="txttypelink" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="1" selected="selected">Link Trailer</option>
                  <option value="2">Link Download</option>
                  <option value="3">Link Xem</option>
                </select>
              </div>
              <div class="form-group">
                <label for="title_vn">Nhập Mô Tả</label>
                <textarea name="descreption" class="form-control" id="descreption" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="txtLink">Nhập Link</label>
                <input type="text" class="form-control" name="txtlink" id="txtLink" placeholder="Nhập link ...">
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