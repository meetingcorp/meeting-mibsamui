@extends('adminlte::page')

@section('content')

    <div class="row" style="padding-top: 20px;">
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="container">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6  col-md-12">
            <div class="card">
                <div class="card-header">
                    หน้าเพจที่เข้าบ่อยสุด
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered" id="the_most_page_views">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>URL</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($mostpages as $page)

                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                                <td>
                                    {{$page['url']}}
                                </td>
                                <td>
                                    {{$page['pageViews']}}
                                </td>
                            </tr>
                            @php $i++ @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ผู้เข้าชม</span>
                    <span class="info-box-number">
                    {{$analyticsData['ga:visitors']}}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">จำนวนหน้าที่ชม</span>
                    <span class="info-box-number">
                    {{$analyticsData['ga:pageviews']}}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ผู้เข้าชมใหม่</span>
                    <span class="info-box-number">
                  {{$analyticsData['ga:newUsers']}}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-desktop"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bounce Rate</span>
                    <span class="info-box-number">
                    {{number_format($analyticsData['ga:bounceRate'],2) }}
                  <small>%</small>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    @section('plugins.Chartjs',true)
    @push('js')
        <script>
            visitor = @json($visitors);
            pageviewe = @json($pageviews);
            labels =  @json($date);
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Visitor',
                            data: visitor,
                        },
                        {
                            label: 'Pageviews',
                            data: pageviewe,
                        }
                    ]
                },
            });
        </script>
    @endpush
@endsection