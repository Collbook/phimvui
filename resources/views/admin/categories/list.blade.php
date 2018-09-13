@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <small>
          <ol class="breadcrumb">
              <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
              <li><a href="javascript:void(0)">chuyên mục</a></li>
              <li class="active">danh sách chuyên mục</li>
            </ol>
      </small>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                {{-- header --}}
                @if(session('thongbao'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('thongbao') }}
                </div>
                @endif
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-striped" id="table" >
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th class="text-center">Category name</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Create at</th>
                    <th class="text-center">Update at</th>
                    <th width="120" class="text-center">
                      AddCate &nbsp;
                        <a href="{{ route('admin.cate.create') }}" class="create-modal btn btn-success btn-sm text-justify">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0; ?>
                  @foreach ($category as $cate)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td width="120">{{ $cate->name }}</td>
                    <td width="120">{{ $cate->slug }}</td>
                    <td>{{ $cate->description }}</td>
                    <td width="65">{{ $cate->created_at }}</td>
                    <td width="65">{{ $cate->updated_at }}</td>
                    <td class="text-center">
                        <a href="#" class="show-modal btn btn-info btn-sm" data-slug="{{ $cate->slug }}" data-id="{{ $cate->id }}" data-title="{{ $cate->name }}" data-body="{{ $cate->description }}"   >
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.cate.edit',$cate->id) }}" class="edit-modal btn btn-warning btn-sm">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="{{ route('admin.cate.del',$cate->id) }}" class="delete-modal btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>

                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->


            
          </div>
          <!-- /.col -->
      </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><P class="lead"> </P></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID : </label>
                    <span  id="i"/>
                </div>
                <div class="form-group">
                    <label for="">Title :</label>
                    <span id="ti"/>
                </div>
                <div class="form-group">
                    <label for="">Body :</label>
                    <span id="by"/>
                </div>
                <div class="form-group">
                    <label for="">Slug :</label>
                    <span id="slug"/>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('body.css')
<link rel="stylesheet" href="assets/backend/dist/css/my_list_cate_style.css">
@endsection

@section('body.script')
  <script src="assets/backend/dist/js/data_table_paginate.js"></script>

  <script type="text/javascript">

    // show cate detail
    $(document).on('click', '.show-modal', function(e) {
      e.preventDefault();
      $('#show').modal('show');
      $('#i').text($(this).data('id'));
      $('#ti').text($(this).data('title'));
      $('#by').text($(this).data('body'));
      $('#slug').text($(this).data('slug'));
      $('.modal-title').text('Categories Details');
      });      
</script>
@endsection
