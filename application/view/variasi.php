<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<!-- Javascripts-->
  <script src="<?php echo base_url ('assets/js/jquery-2.1.4.min.js'); ?>"></script>
  <script src="<?php echo base_url ('assets/js/essential-plugins.js'); ?>"></script>
  <script src="<?php echo base_url ('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url ('assets/js/plugins/pace.min.js'); ?>"></script>
  <script src="<?php echo base_url ('assets/js/main.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url ('assets/js/plugins/chart.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url ('assets/js/plugins/jquery.vmap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url ('assets/js/plugins/jquery.vmap.world.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url ('assets/js/plugins/jquery.vmap.sampledata.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js');?>"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
 <script>
    <script type="text/javascript">
      $(document).ready(function(){
      	var data = {
      		labels: ["January", "February", "March", "April", "May"],
      		datasets: [
      			{
      				label: "My First dataset",
      				fillColor: "rgba(220,220,220,0.2)",
      				strokeColor: "rgba(220,220,220,1)",
      				pointColor: "rgba(220,220,220,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(220,220,220,1)",
      				data: [65, 59, 80, 81, 56]
      			},
      			{
      				label: "My Second dataset",
      				fillColor: "rgba(151,187,205,0.2)",
      				strokeColor: "rgba(151,187,205,1)",
      				pointColor: "rgba(151,187,205,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(151,187,205,1)",
      				data: [28, 48, 40, 19, 86]
      			}
      		]
      	};
      	var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      	var lineChart = new Chart(ctxl).Line(data);
      
      	var map = $('#demo-map');
      	map.vectorMap({
      		map: 'world_en',
      		backgroundColor: '#fff',
      		color: '#333',
      		hoverOpacity: 0.7,
      		selectedColor: '#666666',
      		enableZoom: true,
      		showTooltip: true,
      		scaleColors: ['#C8EEFF', '#006491'],
      		values: sample_data,
      		normalizeFunction: 'polynomial'
      	});
      });
    </script>
</html>