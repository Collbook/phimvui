@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh sách Link phim
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
     <div class="col-xs-12">
         <a href="{{route('admin.link.add')}}"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Thêm Link Phim</button></a>
      <div class="box">
        @include('admin.flashmess.mess')
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row" class="success">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">
                Tên Phim</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mô Tả</th>

                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Loại Link</th>

                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Link</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Chức Năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($links as $link)
              <tr role="row" class="odd">
                <td class="">{{$link ->films->title_vi}}</td>
                <td>{{$link->description}}</td>
                <td class="sorting_1">@if($link->type ==1)
                  {{ 'Link Trailer' }}
                  @elseif($link->type ==2)
                  {{'Link Dowload'}}
                  @else
                  {{'Link Xem'}}
                  @endif
                </td>
                <td>{{$link->link}}</td>
                <td>
                  <a href="{{route('admin.link.delete',['id'=>$link->id])}}" onclick="return xacnhan();" class="btn btn-danger">Xóa</a>
                  <a href="{{route('admin.link.edit',['id'=>$link->id])}}" class="btn btn-primary">Sửa</a>
                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
            hiển thị 10/57 bộ
          </div>
        </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection