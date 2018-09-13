<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
    $(document).ready(function() {
        // Ajax khi thay doi nam hien thi do thi
        var text = 'Đồ thị năm ' + {{ $year }};
        
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