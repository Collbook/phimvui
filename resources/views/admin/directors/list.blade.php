@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <small>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="javascript:void(0)">Đạo diễn</a></li>
            <li class="active">Danh sách đạo diễn</li>
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
                <table class="table table-bordered table-striped" id="table">
                  <thead>
                  <tr>
                    <th width="20">STT</th>
                    <th class="text-center">Director name</th>
                    <th class="text-center">Biography</th>
                    <th class="text-center" style="width:46px;>Countries</th>
                    <th width="85" class="text-center">Birthday</th>
               
                    <th class="text-center">
                       Actors&nbsp;
                        <a href="{{ route('admin.director.create') }}" class="create-modal btn btn-success btn-sm text-justify">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0; ?>
                  @foreach ($directors as $director)
                  <?php $no++; ?>
                  <tr>
                    <td >{{ $no }}</td>
                    <td >{{ $director->fullname }}
                        <p class="text-center">
                            <img width="48"  src="upload/director/{{ $director->image }}" alt="">
                        </p>
                    </td>
                    <td>{{ $director->biography }}</td>
                    <td>{{ $director->countries->name }}</td>
                    <td>{{ $director->birthday }}</td>
           
                    <td class="text-center">
                        <a href="#" class="show-modal btn btn-info btn-sm" data-slug="{{ $director->slug }}" data-id="{{ $director->id }}" data-title="{{ $director->fullname }}" data-body="{{ $director->biography }}"   >
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.director.edit',$director->id) }}" class="edit-modal btn btn-warning btn-sm">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="{{ route('admin.director.del',$director->id) }}" class="delete-modal btn btn-danger btn-sm">
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
      $('.modal-title').text('Director Details');
      });      
</script>
@endsection
