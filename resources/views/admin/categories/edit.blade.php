@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa chuyên mục
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="javascript:void(0)">Chuyên mục</a></li>
      <li class="active">Sửa chuyên mục</li>
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


          <form role="form" action="{{ route('admin.cate.update',$cate['0']['id']) }}" method="POST">
            
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
                

              <div class="form-group">
                <label for="Categories">Tên chuyên mục : </label>
                <input type="text" name="cate"  value="{{ $cate['0']['name'] }}" class="form-control" id="cate" placeholder="Mời bạn nhập tên chuyên mục...">
              </div>
              <div class="form-group">
                <label>Description : </label>
                <textarea class="form-control" name="description" rows="13" placeholder="Mời bạn nhập mô tả...">{{ $cate['0']['description'] }}</textarea>
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