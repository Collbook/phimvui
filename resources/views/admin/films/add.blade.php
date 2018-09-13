@extends('admin.layout.index')

@section('body.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nhập Phim
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.phim.index')}}">Phim</a></li>
                <li class="active">Nhập Phim</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    {{--@include('admin.error.errror')--}}
                    <form action="{{route('admin.phim.add')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Chọn Phim Cha</label>
                                        <select class="form-control" name="parentFilm" id="parentFilm"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="0">Không Chọn</option>
                                            @foreach($films  as $film)
                                                <option value="{{$film ->id}}">{{$film ->title_vi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn danh mục phim</label>
                                        <select id="categories" name="categories[]" multiple class="form-control">
                                            <option value="0">Không Chọn</option>
                                            @foreach($categories  as $category)
                                                <option value="{{$category ->id}}">{{$category ->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa fa-language" style="color: #0097e6;font-size: 20px"></i><label>Lựa
                                            chọn ngôn ngữ</label>
                                        <select id="lang" name="lang[]" multiple class="form-control">
                                            <option value="0">Không Chọn</option>
                                            @foreach($languages  as $lang)
                                                <option value="{{$lang ->id}}">{{$lang ->language}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_vn">Nhập Tiêu Đề Tiếng Việt</label>
                                        <input type="text" value="{{old('title_vn')}}"
                                               class="form-control {{$errors->has('title_vn') ?'is-invalid' :''}}"
                                               name="title_vn" id="title_vn" placeholder="nhập tiêu đề tiếng việt...">
                                        <span class="form-text" style="color: red">{{$errors->first('title_vn')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" value="{{old('slug')}}" class="form-control" name="slug"
                                               id="slug" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">Nhập Tiêu Đề Tiếng Anh</label>
                                        <input type="text" value="{{old('title_en')}}"
                                               class="form-control {{$errors->has('title_en') ?'is-invalid' :''}}"
                                               name="title_en" id="title_en" placeholder="nhập tiêu đề tiếng anh...">
                                        <span class="form-text" style="color: red">{{$errors->first('title_en')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Nhập Mô Tả</label>
                                        <input type="text" value="{{old('description')}}"
                                               class="form-control {{$errors->has('description') ?'is-invalid' :''}}"
                                               name="description" id="description" placeholder="nhập mô tả...">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('description')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_production">Nhập nhà sản xuất</label>
                                        <input type="text" value="{{old('company_production')}}"
                                               class="form-control {{$errors->has('company_production') ?'is-invalid' :''}}"
                                               name="company_production" id="company_production"
                                               placeholder="nhập vào nhà sản xuất">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('company_production')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_episodes">Nhập tổng số tập</label>
                                        <input type="number" value="{{old('total_episodes')}}"
                                               class="form-control {{$errors->has('total_episodes') ? 'is-invalid': ''}}"
                                               name="total_episodes" id="total_episodes"
                                               placeholder="nhập tổng số tập...">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('total_episodes')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="published_year">Năm Xuất Bản</label>
                                        <input type="number" value="{{old('published_year')}}"
                                               class="form-control {{$errors->has('published_year') ? 'is-invalid': ''}}"
                                               name="published_year" id="published_year"
                                               placeholder="nhập năm xuất bản">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('published_year')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_theater">Nhập ngày chiếu rạp</label>
                                        <input type="text" value="{{old('date_theater')}}"
                                               class="form-control {{$errors->has('date_theater') ? 'is-invalid': ''}}"
                                               name="date_theater" id="datepicker2"
                                               placeholder="nhập tiêu đề tiếng việt..." autocomplete="off">
                                        <span class="form-text help-block"
                                              style="color: red">{{$errors->first('date_theater')}}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="tags">Thẻ Tags</label>
                                        <select name="tags[]" id="tags" class="form-control" multiple>
                                            @if(old('tags'))
                                                @foreach(old('tags') as $tag)
                                                    <option value="{{$tag}}" selected>{{$tag}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Lựa
                                            chọn quốc gia</label>
                                        <select id="countries" name="countries[]" multiple class="form-control">
                                            <option value="0">Không Chọn</option>
                                            @foreach($countries  as $country)
                                                <option value="{{$country->id}}">{{$country ->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn Diễn Viên</label>
                                        <select id="actor" name="actor[]" multiple class="form-control">
                                            <option value="0">Không Chọn</option>
                                            @foreach($actor  as $at)
                                                <option value="{{$at->id}}">{{$at ->fullname}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="time">Nhập Thời Lượng Phim</label>
                                        <input type="number" value="{{old('time')}}"
                                               class="form-control {{$errors->has('time') ? 'is-invalid': ''}}"
                                               name="time" id="time"
                                               placeholder="thời lượng phim..." min="1">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('time')}}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="text-primary">Tùy Chọn</label>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <label for="">Phim Sắp Chiếu</label>
                                                <div class="material-switch pull-right">
                                                    <input id="theater_status" name="theater_status" type="checkbox" value="1"/>
                                                    <label for="theater_status" class="label-warning"></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="">Phim Rạp</label>
                                                <div class="material-switch pull-right">
                                                    <input id="txtrap" name="txtrap" type="checkbox" value="1"/>
                                                    <label for="txtrap" class="label-warning"></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="">Phim Hot</label>
                                                <div class="material-switch pull-right">
                                                    <input id="txthot" name="txthot" type="checkbox" value="1"/>
                                                    <label for="txthot" class="label-warning" ></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label for="resolution">Độ Phân Giải:</label>
                                        <select class="form-control" name="resolution" id="resolution"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="360">360</option>
                                            <option value="480" selected="selected">480</option>
                                            <option value="720">720</option>
                                            <option value="1080">1080</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_thumbnail ">Ảnh Đại Diện</label>
                                        <input class="form-control {{$errors->has('img_thumbnail') ? 'is-invalid': ''}} "
                                               name="img_thumbnail" type="file" id="exampleInputFile">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('img_thumbnail')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_background">Ảnh Background</label>
                                        <input name="img_background"
                                               class="form-control {{$errors->has('img_background') ? 'is-invalid': ''}} "
                                               type="file" id="img_background">
                                        <span class="form-text"
                                              style="color: red">{{$errors->first('img_background')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh Mục Phim</label>
                                        <select class="form-control" name="txttype" id="txttype" style="width: 100%;"
                                                tabindex="-1" aria-hidden="true">
                                            <option value="1">Phim Bộ</option>
                                            <option value="0" selected="selected">Phim Lẻ</option>
                                        </select>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col-->
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('body.css')
    <link rel="stylesheet" href="{{asset('css/phim/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/phim/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/phim/checkboxstyle.css')}}">
    {{--định nghĩa style--}}
    <link rel="stylesheet" href="{{asset('css/phim/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/phim/bootstrap-multiselect.css')}}">

@endsection
@section('body.script')
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script>
        $(function () {
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <script type="text/javascript">
        $("#tags").select2({
            tags: true,
            width: '100%',
            tokenSeparators: [',']
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#lang').multiselect({
                nonSelectedText: 'Chọn ngôn ngữ',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%'
            });
            $('#categories').multiselect({
                nonSelectedText: 'Chọn danh mục',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%'
            });

            $('#countries').multiselect({
                nonSelectedText: 'Chọn Quốc Gia',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%'
            });
            $('#actor').multiselect({
                nonSelectedText: 'Chọn Diễn Viên',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%'
            });
        });
    </script>
    <script>
        function change_alias(alias) {
            var str = alias;
            str = str.toLowerCase();
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
            str = str.replace(/ + /g, " ");
            str = str.trim();
            return str;
        }

        $(document).ready(function () {
            $("#title_vn").keyup(function () {
                var Text = $(this).val();
                Text = change_alias(Text);
                var regExp = /\s+/g;
                Text = Text.replace(regExp, '-');
                $("#slug").val(Text);
            });
        });
    </script>
@endsection