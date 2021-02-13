@extends('layout.content' , ["title" => "پنل کاربری | پاوز"])
@section('content')
    <div class="container-fluid">
        <div class="row dashboard justify-content-center panel">
            <div class="col-12 col-md-10">
                @include('partials.panel.navbar')
                <div class="container-fluid">
                    @include('partials.panel.statistics.statistics')
                    <br>
                    <br>
                    <div class="row justify-content-center dashboard-info">
                        @include('partials.panel.dashboard.last-comments')
                        @include('partials.panel.dashboard.last-reserves')
                        @include('partials.panel.dashboard.last-tickets')
                        @include('partials.panel.dashboard.vip')
                    
                       

                        <div class="col-11 col-md-8">
                            <div class="dashboard-info-item-content">
                                <h3>
                                    جاذبه های گردشگری شما

                                    <a href="">همه موارد</a>
                                </h3>
                                <br>
                                <br>
                                <table class="table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>عنوان</th>
                                            <th>نمایش عکس</th>
                                            <th>نمایش متن</th>
                                            <th>وضعیت</th>
                                            <th>تاریخ ثبت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>قلعه مارکوه</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary is">نمایش</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning is">نمایش</button>

                                            </td>
                                            <td>در دست بررسی</td>
                                            <td dir="rtl">8 دی ماه 99 

                                                23:15
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>قلعه مارکوه</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary is">نمایش</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning is">نمایش</button>

                                            </td>
                                            <td>در دست بررسی</td>
                                            <td dir="rtl">8 دی ماه 99 

                                                23:15
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>3</td>
                                            <td>قلعه مارکوه</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary is">نمایش</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning is">نمایش</button>

                                            </td>
                                            <td>در دست بررسی</td>
                                            <td dir="rtl">8 دی ماه 99 

                                                23:15
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>قلعه مارکوه</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary is">نمایش</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning is">نمایش</button>

                                            </td>
                                            <td>در دست بررسی</td>
                                            <td dir="rtl">8 دی ماه 99 

                                                23:15
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.panel.sidebar')
        </div>
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
        var options = {
            series: [{
                name: "بازدید ویلا",
                data: [15, 25, 17, 29]
            }],
            chart: {
                height: 150,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['7 دی', '8 دی', '9 دی', '10 دی'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
        chart2.render();


        var chart3 = new ApexCharts(document.querySelector("#chart3"), options);
        chart3.render();


        var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
        chart4.render();



        const day = 29;
        var options = {
            series: [day * 100 / 30],
            chart: {
                height: 350,
                type: 'radialBar',
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: '16px',
                            color: undefined,
                            offsetY: 120 , 
                        },
                        value: {
                            offsetY: 0,
                            fontSize: '22px',
                            color: undefined,
                            formatter: function(val) {
                                return day + " روز ";
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 0, 65, 91]
                },
            },
            stroke: {
                dashArray: 4
            },
            labels: ['روز های باقی مانده تا اتمام حساب vip'],
        };

        var chart5 = new ApexCharts(document.querySelector("#chart5"), options);
        chart5.render();

    </script>
@endpush
