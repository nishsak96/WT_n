<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include 'connect.php';
	$query= "select * from transactions";

    $result=mysql_query($query);
    mysql_num_rows($result);
    $data=mysql_fetch_array($result);
    //foreach ($data as $i => $value) 
    {
    	# code...
   print_r($data);
}
    echo "<script>

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([['Mushrooms', 3],['Onions', 1],['Olives', 1],['Zucchini', 1],['Pepperoni', 2]]);

      // Set chart options
      var options = {'title':'How Much Pizza I Ate Last Night',
                     'width':800,
                     'height':600};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
      chart.draw(data, options);

      var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
      chart.draw(data, options);

      var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
      chart.draw(data, options);
    }
    </script>";

?>

<div style="position: relative; left: 20%;">
    <div class="abcc" id="chart_div1" style="width:800; height:600"></div>
    <br>

    <div class="abcc" id="chart_div2" style="width:800; height:600"></div>
    <br>
    <div class="abcc" id="chart_div3" style="width:800; height:600"></div>
  </div>


</body>
</html>