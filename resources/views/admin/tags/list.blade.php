@extends('admin.layout.index')


@section('body.content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh sách Tags phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Phim</a></li>
      <li class="active">Danh Sách Tags Phim</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <div class="col-xs-12">
       
      <div class="box">
          @include('admin.flashmess.mess')
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-responsive table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row" class="success">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Rendering engine: activate to sort column ascending">
                ID</th>
                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Engine version: activate to sort column ascending">Tên Tags</th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Chức Năng</th>
              </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr role="row" class="odd">
                    <td class="" colspan="2">{{$tag ->id}}</td>
                    <td class="" colspan="2">{{$tag->name}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.tags.delete',['id'=>$tag->id])}}" class="btn btn-danger" onclick="return xacnhan();">Xóa</a>
                        <a href="{{route('admin.tags.edit',['id'=>$tag->id])}}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table></div></div>
              <div class="text-center">
                  {{$tags->links()}}
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