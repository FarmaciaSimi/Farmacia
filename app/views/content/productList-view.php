<div class="container is-fluid">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de productos</h2>
</div>
<div class="container pb-6">

	<div class="form-rest mb-6 mt-6"></div>

	<?php
		use app\controllers\productController;

		$insProducto = new productController();

		echo $insProducto->listarProductoControlador($url[1],10,$url[0],"",0);
	?>

	<!--GRAFICA DE TODOS LOS PRODUCTOS-->
	<?php
	require_once "C:/xampp/htdocs/ESLAVA/VENTAS-Aldair/config/_db.php";
	?>
	<html>
	<head>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Task', 'Hours per Day'],
					<?php
					$SQL = "SELECT * FROM producto";
					$consulta = mysqli_query($conexion, $SQL);
					while ($resultado = mysqli_fetch_assoc($consulta)) {
					echo "['" . $resultado['producto_nombre'] . " " . $resultado['producto_stock_total'] . "pzs." . "', " . $resultado['producto_stock_total'] . "],";
					}
					?>
				]);
				var options = {
					title: 'PRODUCTOS EXISTENTES'
				};
				var chart = new google.visualization.PieChart(document.getElementById('piechart'));
				chart.draw(data, options);
			}
		</script>
	</head>
	<body>
		<div id="piechart" style="width: 900px; height: 500px;"></div>
	</body>
	</html>

</div>