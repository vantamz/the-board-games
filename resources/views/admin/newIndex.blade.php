@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block">
    <!--market updates updates-->
    <div class="market-updates">
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-8 market-update-left">
                    <h3>{{ $staffCount }}</h3>
                    <h4>Employees</h4>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-file-text-o"> </i>
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-8 market-update-left">
                    <h3>{{ $customerCount }}</h3>
                    <h4>Members</h4>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fad fa-users"></i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-8 market-update-left">
                    @php
                    $incomeYear=0;
                    foreach ($invoiceYearCount as $item)
                    $incomeYear+=$item->total_price
                    @endphp
                    <h3>{{ number_format($incomeYear, 2) }} $</h3>
                    <h4>Earnings (Year)</h4>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fad fa-dollar-sign"></i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--market updates end here-->
    <!--mainpage chit-chating-->
    <div class="chit-chat-layer1">
        <div class="col-md-12 chit-chat-layer1-left">
            <div class="work-progres">
                <div class="chit-chat-heading">
                    Best sell of the month
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table-striped table-bordered table table-responsive overflow-auto row-border hover todo-table" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Products sold number</th>
                                <th>Money earn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0 ?>
                            @foreach ($invoiceNumber as $item)
                            <tr>
                                <?php $no++ ?>
                                @if($no==1)
                                <td> <span class="label label-danger">{{$no}} <i class="fas fa-medal"></i></span></td>
                                @elseif($no==2)
                                <td><span class="label label-primary">{{$no}} <i class="fas fa-medal"></i></span></td>
                                @elseif($no==3)
                                <td><span class="label label-success">{{$no}} <i class="fas fa-medal"></i></span></td>
                                @else
                                <td>{{$no}}</td>
                                @endif
                                
                                <td><span class="label label-primary">{{$item->product->name}}</span></td>
                                <td>{{$item->totalSell}} <i class="fad fa-box-check"></i></td>
                                <td><span class="badge badge-info">{{ number_format($item->totalEarn, 2) }} $</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--main page chit chating end here-->
    <div class="main-page-charts">
        <div class="main-page-chart-layer1">
            <!--<div class="col-md-6 chart-layer1-left">-->
            <!--    <div class="glocy-chart">-->
            <!--        <div class="span-2c">-->
            <!--            <h3 class="tlt">All product in store</h3>-->
            <!--            <div id="piechart_3d" style="width: 700px; height: 500px;"></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-md-12 chart-layer1-left">
                <div class="glocy-chart">
                    <div class="span-2c">
                        <h3 class="tlt">Sales Analytics</h3>
                        <canvas id="myChart" class="chart-style"></canvas>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--main page chart start here-->
    <div class="chit-chat-layer1">
        <div class="col-md-12 chit-chat-layer1-left">
            <div class="work-progres">
                <div class="chit-chat-heading">
                    Calendar
                </div>
                <br>
                <div id='calendar'></div>
                
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    
</div>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Monthly Earn',
                data: {!!json_encode($datas) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: { // defining min and max so hiding the dataset does not change scale range
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });

</script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          
        });
        calendar.render();
      });

    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Stock'],
          <?php echo $chartData?>
        ]);

        var options = {
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
@endsection
