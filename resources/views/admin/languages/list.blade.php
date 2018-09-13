@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <small>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
              <li><a href="#">Ngôn ngữ</a></li>
              <li class="active">Danh sách ngôn ngữ</li>
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
                    <th width="10" class="text-center fix_width_stt">STT</th>
                    <th width="120" class="text-center">Languages</th>
                    <th width="120" class="text-center">Slug</th>
                    <th width="65" class="text-center">Create at</th>
                    <th width="65" class="text-center">Update at</th>
                    <th width="100" class="text-center fix_width_action">
                      News &nbsp;
                        <a href="{{ route('admin.language.create') }}" class="create-modal btn btn-success btn-sm text-justify">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0; ?>
                  @foreach ($languages as $lang)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $lang->language }}</td>
                    <td>{{ $lang->slug }}</td>
                    <td>{{ $lang->created_at }}</td>
                    <td>{{ $lang->updated_at }}</td>
                    <td  class="text-center">
                        <a href="#" class="show-modal btn btn-info btn-sm" data-slug="{{ $lang->slug }}" data-id="{{ $lang->id }}" data-title="{{ $lang->language }}" data-body="{{ $lang->description }}"   >
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.language.edit',$lang->id) }}" class="edit-modal btn btn-warning btn-sm">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="{{ route('admin.language.del',$lang->id) }}" onclick="return xacnhan()" class="delete-modal btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
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
                        <label for="">Slug :</label>
                        <span id="slug"/>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('body.css')
<link rel="stylesheet" href="assets/backend/dist/css/my_list_lang_style.css">
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
      $('.modal-title').text('Languages Details');
      });      
</script>
@endsection


