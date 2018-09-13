@extends('admin.layout.index')


@section('body.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bảng điều khiển
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Bảng điều khiển</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $count_post_film }}</h3>

                        <p>Phim mới cập nhật</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-film"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.new.postfilm') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $count_register }}</h3>

                        <p>Người dùng đăng ký mới</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.new.register') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $count_visited_day }}</h3>

                        <p>Lượt khách truy cập</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.visited') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $count_comment }}</h3>

                        <p>Lượt bình luận mới</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comment"></i>
                    </div>
                    <a href="{{ route('admin.comment.list.newcomment') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- Đồ thị -->
        <div class="row">
            <div class="col-lg-3">
                <form action="{{ route('admin.dashboard.chart') }}" method="GET" role="form" class="form-inline" id="hight-chart">
                    <div class="form-group">
                        <label for="">Đồ thị</label>
                        <select name="year" id="year" class="form-control">
                        <?php
                            for ($i = 2018; $i <= $current_year; $i++) { 
                                echo '<option value="' . $i . '">Năm ' . $i . '</option>';
                            }
                         ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div id="change-year-chart">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        
        <br>
        <hr>
        <!-- right col -->
    <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>

@section('body.script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
<script src="{{ asset('js/admin/hightchart/highcharts.js') }}"></script>
{{-- <script src="https://code.highcharts.com/modules/series-label.js"></script> --}}
{{-- <script src="{{ asset('js/admin/hightchart/series-label.js') }}"></script> --}}
{{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
{{-- <script src="{{ asset('js/admin/hightchart/exporting.js') }}"></script> --}}
{{-- <script src="https://code.highcharts.com/modules/export-data.js"></script> --}}
{{-- <script src="{{ asset('js/admin/hightchart/export-data.js') }}"></script> --}}
    
<script>
    $(document).ready(function() {
        // Ajax khi thay doi nam hien thi do thi
        var text = 'Đồ thị năm ' + {{ $current_year }};
        // console.log(text);
        $("select#year").on('change', function(event) {
            var current_year = $(this).val();
            var action = $(this).parents('form#hight-chart').attr('action');
            text = 'Đồ thị năm ' + current_year;
            console.log(text);

            $.ajax({
                url: action,
                // dataType: 'json',
                data: {current_year: current_year},
            })
            .done(function(data) {
                // console.log(data);
                $("div#change-year-chart").html(data);
            })
            .fail(function() {
                console.log("error");
            });
            
        });
        var customer_commented = <?php echo json_encode($count_comment_months) ?>;
        var customer_register  = <?php echo json_encode($count_register_months) ?>;
        var film_posted        = <?php echo json_encode($count_filmpost_months) ?>;
        var customer_visited   = <?php echo json_encode($count_visited_months) ?>;

        Highcharts.chart('container', {

            title: {
                text: text
            },

            subtitle: {
                text: 'Nguồn: phimvui.net'
            },

            xAxis: {
                categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
            },

            yAxis: {
                title: {
                    text: 'Đơn vị tính'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                spline: {
                    marker: {
                        enabled: true
                    }
                }
            },

            series: [{
                name: 'Khách đăng ký',
                data: customer_register
            }, {
                name: 'Lượt khách truy cập',
                data: customer_visited
            }, {
                name: 'Lượt bình luận',
                data: customer_commented
            }, {
                name: 'Lượt phim đã đăng',
                data: film_posted
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    });
    

</script>

@endsection

@endsection 