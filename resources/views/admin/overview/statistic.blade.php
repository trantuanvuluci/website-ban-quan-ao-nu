@extends('admin.layout.index')

@section('content')
<div>		
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thống kê</h1>
		</div>
	</div><!--/.row-->
									
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<i class="fa fa-shopping-bag"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $totalProduct }}</div>
						<div class="text-muted">Sản phẩm</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<i class="fa fa-bar-chart"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $totalProductType }}</div>
						<div class="text-muted">Loại sản phẩm</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $totalStatistic }}</div>
						<div class="text-muted">Tổng hóa đơn</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<i class="fa fa-users"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $totalUser }}</div>
						<div class="text-muted">Người dùng</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
    // Create the chart
    let data = "{{ $dataMoney }}";
    
    dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê doanh thu theo ngày, tuần, tháng, năm'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Mức độ'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} VNĐ'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} VNĐ</b> of total<br/>'
        },

        series: [
            {
                name: "Thống kê doanh thu",
                colorByPoint: true,
                data: dataChart
            }
        ]
    });
</script>
@endsection