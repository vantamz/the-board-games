@extends('admin.layout')
@section('content')
<div class="container-fluid pad-bot-20">
    <div style="padding-top: 20px">
        <h2>Dashboard</h2>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <div class="rounded border-start border-primary border-4 background-white">
                <div class="container report-style">
                    <span class="info-board">Employees</span>
                    <h5><i class="far fa-users"></i> {{ $staffCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="rounded border-start border-success border-4 background-white">
                <div class="container report-style">
                    <span class="info-board">Members</span>
                    <h5><i class="far fa-users"></i> {{ $customerCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="rounded border-start border-cyan border-4 background-white">
                <div class="container report-style">
                    <span class="info-board">Earnings (Year)</span>
                    @php
                    $incomeYear=0;
                    foreach ($invoiceYearCount as $item)
                    $incomeYear+=$item->total_price
                    @endphp
                    <h5><i class="fas fa-money-bill-wave-alt"></i> {{ $incomeYear }} $</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="rounded border-start border-warning border-4 background-white">
                <div class="container report-style">
                    <span class="info-board">Number Invoice (Month)</span>
                    <h5><i class="fas fa-file-invoice-dollar"></i> {{ $invoiceCount }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 20px">
        <h2>Chart</h2>
        <div class="row d-flex chart-color">
            <div class="col-lg-6" style="padding-top: 20px">
                <canvas id="myChart" class="chart-style"></canvas>
            </div>
            <div class="col-lg-6" style="padding-top: 20px">
                <canvas id="TopProduct" class="chart-style"></canvas>
            </div>
        </div>
    </div>
    <div style="padding-top: 20px;padding-bottom:30px">
        <div class="row">
            <div class="col-lg-6">
                <div style="padding-bottom: 20px">
                    <h2>Calender</h2>
                </div>
                <div class="main-calender">
                    <div class="sideb">
                        <div class="header"><i class="fa fa-angle-left" aria-hidden="true"></i><span><span
                                    class="month"> </span><span class="year"></span></span><i class="fa fa-angle-right"
                                aria-hidden="true"></i></div>
                        <div class="calender">
                            <table>
                                <thead>
                                    <tr class="weedays">
                                        <th data-weekday="sun" data-column="0">Sun</th>
                                        <th data-weekday="mon" data-column="1">Mon</th>
                                        <th data-weekday="tue" data-column="2">Tue</th>
                                        <th data-weekday="wed" data-column="3">Wed</th>
                                        <th data-weekday="thu" data-column="4">Thu</th>
                                        <th data-weekday="fri" data-column="5">Fri</th>
                                        <th data-weekday="sat" data-column="6">Sat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="days" data-row="0">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                    <tr class="days" data-row="1">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                    <tr class="days" data-row="2">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                    <tr class="days" data-row="3">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                    <tr class="days" data-row="4">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                    <tr class="days" data-row="5">
                                        <td data-column="0"></td>
                                        <td data-column="1"></td>
                                        <td data-column="2"></td>
                                        <td data-column="3"></td>
                                        <td data-column="4"></td>
                                        <td data-column="5"></td>
                                        <td data-column="6"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script src="{{ asset('BackEnd/js/calender.js') }}"></script>

                </div>
            </div>
            <div class="col-lg-6">
                    <div class="row" style="padding-bottom: 20px">
                        <div class="col-lg-6">
                            <h2>To do list</h2>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <button class="btn btn-primary" data-bs-target="#todoModal" data-bs-toggle="modal">Add</button>
                        </div>
                    </div>
                    <section>
                        @include('admin.listTodo')
                </section>

            </div>
        </div>
    </div>
</div>

@include('admin.todoModal')
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
<script src="{{ asset('BackEnd/js/adminPanel.js') }}"></script>
@endsection
