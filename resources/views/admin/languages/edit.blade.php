@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa ngôn ngữ
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="#">Ngôn ngữ</a></li>
      <li class="active">Sửa ngôn ngữ</li>
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


          <form role="form" action="{{ route('admin.language.update',$langs->id) }}" method="POST">
            
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
                <label for="Categories">Tên ngôn ngữ : </label>
                <input type="text" name="lang"  value="{{ $langs->language }}" class="form-control" id="cate" placeholder="Mời bạn nhập tên ngôn ngữ...">
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