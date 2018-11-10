<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sex', 'Count'],
          ['Female',    11],
          ['Male',      2]
        ]);

        var options = {
          title: 'Gender Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('gender_dist'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="gender_dist" style="width: 900px; height: 500px;"></div>
  </body>
</html>
