@extends('layouts.app')

@section('title', 'Mi cuenta')


@section('content')
    <h1>encuentra un profesional en tu ciudad</h1>
    <div class="row">
    	<div class="col-sm-4">
    		<a href="#" class="list-group-item">
			  	<img src="/t.php?src=/img/pic.jpg&w=80&h=80" class="pull-left">
			    <h4 class="list-group-item-heading">Kalvin Manson</h4>
			    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ve</p>
			  </a>
			<div class="list-group">
			  <a href="#" class="list-group-item disabled">
			    Cras justo odio
			  </a>
			  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
			  <a href="#" class="list-group-item">Morbi leo risus</a>
			  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
			  <a href="#" class="list-group-item">Vestibulum at eros</a>
			</div>
    	</div>
    	<div class="col-sm-8">
    	<h1>Mis prograsos</h1>
    	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', '']
                    ,[0,  15]
                    ,[4,  16]
                    ,[8,  50]
                    ,[16,  50]
                    ,[20,  40]
                    ,[28,  40]
                    ,[32,  10]
                    ,[36,  10]
                    ,[40,  25]
                    ,[44,  35]
                    ,[48,  5]
                    ,[52,  5]
                    ,[56,  0]
                    ,[80,  -50]
                  ]);

        var options = {
          title: 'Grafica',
          hAxis: {title: 'Eje X',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    		
    	</div>
    </div>
@endsection