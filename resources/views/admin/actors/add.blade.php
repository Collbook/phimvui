@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thêm diễn viên
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="javascript:void(0)">Diễn viên</a></li>
      <li class="active">Thêm diễn viên</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            
          </div>
          <!-- /.box-header -->
          <!-- form start -->


          <form role="form" action="{{ route('admin.actor.create') }}" method="POST" enctype='multipart/form-data'>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
                
              @if(session('thongbao'))
              <div class="alert alert-success alert-dismissible">
                  {{ session('thongbao') }}
              </div>
              @endif
              <div class="form-group">
                <label for="Categories">Họ tên : </label>
                <input type="text" name="fullname" class="form-control" id="cate" placeholder="Mời bạn nhập họ tên...">
              </div>
              <div class="form-group">
                <label>Mô tả : </label>
                <textarea class="form-control"name="biography" rows="13" placeholder="Mời bạn nhập mô tả ...">Đang cập nhật thông tin</textarea>
              </div>
              <div class="form-group  col-sm-6 clear-padding-left">
                <label>Quốc gia : </label>
               
                <select name="country" class="form-control" id="">
                  @foreach ($countries as $qg)
                    <option value="{{ $qg->id }}">{{ $qg->name }}</option>
                  @endforeach
                </select>
              
              </div>

              <div class="form-group col-sm-6 clear-padding-rirht">
                <label>Năm sinh:</label>

                <div class="input-group date ">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" value="Chưa có thông tin" name="birthday" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" />
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Ảnh đại diện : </label>
                <input type="file" name="img" class="btn">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


@section('body.css')
<link rel="stylesheet" href="assets/backend/dist/css/my_add_actor_style.css">
@endsection
