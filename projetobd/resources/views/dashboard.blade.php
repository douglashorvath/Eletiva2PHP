<x-app-layout>

    <h5 class="mt-3">Bem vindo ao sistema de controle de estoque!</h5>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produtos', 'Quantidade Vendida'],
          ['Produto A',     11],
          ['Produto B',      2],
          ['Produto C',  2],
          ['Produto D', 2],
          ['Produto E',    7]
        ]);

        var options = {
          title: 'Quantidade de Produtos vendidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div class="d-flex justify-content-center">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</x-app-layout>
