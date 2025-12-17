@extends('backend.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <a class="col-xl-3 col-sm-6 col-6 d-flex" href="{{ route('student.index') }}">
                    <div class="card bg-common w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3>{{ $students }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-graduate fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-xl-3 col-sm-6 col-6 d-flex" href="{{ route('teacher.index') }}">
                    <div class="card bg-common w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Teachers</h6>
                                    <h3>{{ $teachers }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-xl-3 col-sm-6 col-6 d-flex" href="{{ route('user.index') }}">
                    <div class="card bg-common w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Users</h6>
                                    <h3>{{ $users }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-users fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-xl-3 col-sm-6 col-6 d-flex" href="{{ route('collection.index') }}">
                    <div class="card bg-common w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Collections</h6>
                                    <h3>{{ $collections }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-money-check fa-2x text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card card-chart">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mr-2">Fees Collections</h5>
                            <form class="d-flex gap-2" method="GET" action="{{ route('dashboard') }}">
                                <input type="text" class="form-control datetimepicker" placeholder="From" name="from"
                                    class="form-control" value="{{ $from }}">
                                <input type="text" class="form-control datetimepicker" placeholder="To" name="to"
                                    class="form-control" value="{{ $to }}">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div id="feesBarChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let feesChart;

        function renderFeesChart(labels, series) {
            let options = {
                chart: { type: 'bar', height: 350 },
                series: [{ name: "Fees Amount", data: series }],
                xaxis: { categories: labels },
                colors: ['#28a745'],
            };

            if (feesChart) feesChart.destroy();
            feesChart = new ApexCharts(document.querySelector("#feesBarChart"), options);
            feesChart.render();
        }

        // Render chart with data from controller
        renderFeesChart(@json($chart['labels']), @json($chart['series']));
    </script>
@endsection