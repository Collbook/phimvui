@extends('admin.layout.index')


@section('body.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Admin User</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.admin.index') }}">Admin Users</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

  <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body pad">
                        <?php foreach ($admin as $admin): ?>
                        <div class="row">
                            <br>
                            <div class="col-lg-4">
                                <img src="{{ asset('storage/admins/' . $admin->id . '/' . $admin->avatar) }}" alt="{{ $admin->avatar }}" width="80%" class="center-block">
                                <h4 class="text-center">{{ $admin->fullname }}</h4>
                            </div>
                            <div class="col-lg-8">
                                <form action="" method="POST" role="form" enctype="multipart/form-data">
                                    <legend>Edit Admin User<small style="font-size: 70%">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> &nbsp;&nbsp;{{ $admin->username }}/{{ $admin->email }}</small></legend>
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="" class="form-control">
                                            <option value="1" <?php if ($admin->level == 1): ?>selected<?php endif ?> >Admin</option>
                                            <option value="2" <?php if ($admin->level == 2): ?>selected<?php endif ?> >Mode</option>
                                            <option value="3" <?php if ($admin->level == 3): ?>selected<?php endif ?> >Member</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0" <?php if ($admin->status == 0): ?>selected<?php endif ?> >Lock</option>
                                            <option value="1" <?php if ($admin->status == 1): ?>selected<?php endif ?> >Live</option>
                                        </select>
                                    </div>
                        
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection