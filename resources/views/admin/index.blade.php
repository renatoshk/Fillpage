@extends('layouts.admin')
@section('content')
<h1>Admin</h1>
<canvas id="myChart"></canvas>
@stop
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Posts', 'Categories', 'Comments'],
        datasets: [{
            label: 'DATA',
            data: [{{$postCount}}, {{$categoryCount}}, {{$commentCount}}],
            backgroundColor: [
                'red',
                'yellow',
                'white'
               
            ],
            borderColor: [
                'yellow',
                'black',
                'red'
          
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@stop