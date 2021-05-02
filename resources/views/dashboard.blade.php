@extends('layout.panel' , ["title" => "پیشخوان | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <br>
        <br>
        <div class="row justify-content-center dashboard-info">
            @include('partials.panel.dashboard.last-reserves')
            @include('partials.panel.dashboard.last-tickets')
            @include('partials.panel.dashboard.vip')
            @include('partials.panel.dashboard.last-factories')
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
    
        const day = $("#days").val();
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
                            offsetY: 120,
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
