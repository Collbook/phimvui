@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nhập Tags Phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('admin.phim.index')}}">Phim</a></li>
      <li class="active">Nhập Tags Phim</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- form start -->
         @include('admin.error.errror')
          <form role="form" action="{{route('admin.tags.add')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
             <div class="form-group">
                <label for="txttags">Nhập Tags</label>
                <input type="text" class="form-control" id="txttags" name="txttags" placeholder="Nhập Tags ...">
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