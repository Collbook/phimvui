@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa đạo diễn 
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="#">Đạo diễn</a></li>
      <li class="active">Sửa đạo diễn</li>
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


          <form role="form" action="{{ route('admin.director.update',$director->id) }}" method="POST" enctype='multipart/form-data'>
            
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
                <input type="text" name="fullname" value="{{ $director->fullname }}" class="form-control" id="cate" placeholder="Mời bạn nhập họ tên...">
              </div>
              <div class="form-group">
                <label>Mô tả : </label>
                <textarea class="form-control" name="biography" rows="13" placeholder="Mời bạn nhập mô tả...">{{ $director->biography }}</textarea>
              </div>
              <div class="form-group  col-sm-6 clear-padding-left">
                <label>Quốc gia : </label>
               
                <select name="country" class="form-control" id="">
                  @foreach ($countries as $qg )
                  <option value="{{ $qg->id }}"
                  @if($qg->id == $director->id_country)
                  {{ "selected" }}
                  @endif    
                  >{{ $qg->name }}</option>
                  @endforeach


                </select>
              </div>

              <div class="form-group col-sm-6 clear-padding-rirht">
                <label>Ngày sinh:</label>

                <div class="input-group date ">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="date" name="birthday" value="{{ $director->birthday }}" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" />
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
              <button type="submit" class="btn btn-primary">Cập nhật</button>
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
<link rel="stylesheet" href="public/assets/backend/dist/css/my_add_actor_style.css">
@endsection
