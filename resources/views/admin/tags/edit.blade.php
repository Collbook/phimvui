@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa Tags Phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Phim</a></li>
      <li class="active">Sửa Tags Phim</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" action="{{route('admin.tags.update',['id'=>$tags->id])}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
             <div class="form-group">
                <label for="txttags">Nhập Tags</label>
                <input type="text" class="form-control" id="txttags" name="txttags"  value="{{$tags->name}}">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa Tag</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection