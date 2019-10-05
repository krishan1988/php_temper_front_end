<?php
require("config.php")
 ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<div id="container" style="height: 400px"></div>

<?php
session_start();
if (isset($_GET["token"])) {

	$_SESSION["token"] = $_GET["token"];
} ?>

<script type="text/javascript">

	$.ajax({
		url : "<?php echo Api_url; ?>graph",
		type: 'get',
		contentType: 'application/json',
		headers: {
			'Authorization': `Bearer <?= $_SESSION["token"]; ?>`,
		}
	}).done(function(response){ //
		var dd = JSON.parse(response);

		Highcharts.chart('container', dd);
		
	});




</script>

