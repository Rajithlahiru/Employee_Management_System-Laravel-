@extends('layout')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Employees</p>
                    <h6 class="mb-0">{{ $employeeCount }}</h6>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Positions</p>
                    <h6 class="mb-0">{{ $positionCount }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today BSalary</p>
                    <h6 class="mb-0">548000</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total OT</p>
                    <h6 class="mb-0">147000</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Daily Attendance</h6>
                <canvas id="employeeProductivityChart"></canvas>

<script>
var ctx = document.getElementById('employeeProductivityChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [{
            label: 'Employee 1',
            data: [8, 7, 6, 8, 7, 5],
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

    </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Position And No of Employees</h6>
            <canvas id="dummyChart" width="400" height="200"></canvas>

    <script>
        // Dummy data for demonstration
        var labels = ['Manager', 'Assistance', 'Sales', 'Cashier','Security'];
        var data = [1, 2, 5, 2, 2];

        var ctx = document.getElementById('dummyChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Dummy Data',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Overtime Analysis</h6>
                    <canvas id="overtimeAnalysisChart"></canvas>

<script>
var ctx = document.getElementById('overtimeAnalysisChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Manager', 'Assistance', 'Sales', 'Cashier','Security'],
        datasets: [{
            label: 'Overtime Hours',
            data: [14, 16, 15, 10, 25],
            backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

        </div>
    </div>
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Position-wise Salary Distribution</h6>
            <canvas id="salaryDistributionChart"></canvas>

<script>
var ctx = document.getElementById('salaryDistributionChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Manager', 'Assistance', 'Sales', 'Cashier','Security'],
        datasets: [{
            label: 'Average Salary',
            data: [100000, 90000, 50000, 40000, 50000],
            backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</div>
@endsection