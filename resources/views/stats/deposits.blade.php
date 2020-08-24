@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Estado de Cuenta</h5>
                        <h2 class="card-title">Total Pagos</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="chartBig1" width="932" height="275" class="chartjs-render-monitor" style="display: block; height: 220px; width: 746px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Transferencias</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
            </div>
            <div class="card-body">
                <div class="chart-area"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="chartLinePurple" width="277" height="275" class="chartjs-render-monitor" style="display: block; height: 220px; width: 222px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Ordenes</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500</h3>
            </div>
            <div class="card-body">
                <div class="chart-area"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="CountryChart" width="277" height="275" class="chartjs-render-monitor" style="display: block; height: 220px; width: 222px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Clientes</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
            </div>
            <div class="card-body">
                <div class="chart-area"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="chartLineGreen" width="277" height="275" class="chartjs-render-monitor" style="display: block; height: 220px; width: 222px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Mes Anterior',
                backgroundColor: 'red',
                borderColor: 'red',
                data: [
                    10,
                    12,
                    18,
                    22,
                    24,
                    12,
                    14
                ],
                fill: false,
            }, {
                label: 'Mes Actual',
                fill: false,
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: [
                    2,
                    25,
                    32,
                    50,
                    12,
                    24,
                    58
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Transacciones'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    var config2 = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Mes Anterior',
                backgroundColor: 'purple',
                borderColor: 'purple',
                data: [
                    10,
                    12,
                    18,
                    22,
                    24,
                    12,
                    14
                ],
                fill: false,
            }, {
                label: 'Mes Actual',
                fill: false,
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: [
                    2,
                    25,
                    32,
                    50,
                    12,
                    24,
                    58
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Transacciones'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    var config3 = {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Mes Anterior',
                backgroundColor: 'red',
                borderColor: 'red',
                data: [
                    10,
                    12,
                    18,
                    22,
                    24,
                    12,
                    14
                ],
                fill: false,
            }, {
                label: 'Mes Actual',
                fill: false,
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: [
                    2,
                    25,
                    32,
                    50,
                    12,
                    24,
                    58
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Transacciones'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    var config4 = {
        type: 'pie',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Mes Anterior',
                backgroundColor: 'green',
                borderColor: 'green',
                data: [
                    10,
                    12,
                    18,
                    22,
                    24,
                    12,
                    14
                ],
                fill: false,
            }, {
                label: 'Mes Actual',
                fill: false,
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: [
                    2,
                    25,
                    32,
                    50,
                    12,
                    24,
                    58
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Transacciones'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('chartBig1').getContext('2d');
        window.myLine = new Chart(ctx, config);
        var ctx = document.getElementById('chartLinePurple').getContext('2d');
        window.myLine = new Chart(ctx, config2);
        var ctx = document.getElementById('CountryChart').getContext('2d');
        window.myLine = new Chart(ctx, config3);
        var ctx = document.getElementById('chartLineGreen').getContext('2d');
        window.myLine = new Chart(ctx, config4);
    };
</script>

@stop
