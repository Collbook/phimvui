@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh sách Quốc Gia
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Phim</a></li>
      <li class="active">Danh Sách Quốc Gia</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <a href="{{route('admin.country.add')}}"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Thêm Quốc Gia</button></a>
      <div class="box">
        @include('admin.flashmess.mess')
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row" class="success">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Rendering engine: activate to sort column ascending">
                ID</th>
                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Engine version: activate to sort column ascending">Tên Quốc Gia</th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Chức Năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($countries as $country)
              <tr role="row" class="odd">
                <td class="" colspan="2">{{$country ->id}}</td>
                <td class="" colspan="2">{{$country->name}}</td>
                <td class="text-center">
                  <a href="{{route('admin.country.delete',['id'=>$country->id])}}" onclick="return xacnhan();" class="btn btn-danger">Xóa</a>
                  <a href="{{route('admin.country.edit',$country->id)}}"  class="btn btn-primary">Sửa</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
              {{$countries ->links()}}
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection