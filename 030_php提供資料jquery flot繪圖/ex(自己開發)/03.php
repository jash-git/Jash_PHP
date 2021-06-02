
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
//create array of pairs of x and y values
$dataset1 = array();
/*
while ($row = mysql_fetch_assoc()) { //or whatever
    $dataset1[] = array( $row['xvalue'], $row['yvalue'] );
}
*/
$dataset1 = array( 
    array("01月", 2), 
    array("02月", 4), 
    array("03月", 6), 
    array("04月", 8), 
    array("05月", 10), 
    array("06月", 12), 
    array("07月", 14), 
    array("08月", 16), 
    array("09月", 18), 
    array("10月", 20), 
    array("11月", 22), 
    array("12月", 24)
);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Flot Examples: Categories</title>
	<link href="./examples.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
	<script language="javascript" type="text/javascript" src="./flot/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="./flot/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="./flot/jquery.flot.categories.js"></script>
	<script type="text/javascript">

	$(function() {

		var data = <?php echo json_encode($dataset1); ?>;//[ ["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>

	<div id="header">
		<h2>Categories</h2>
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>

		<p>With the categories plugin you can plot categories/textual data easily.</p>

	</div>

	<div id="footer">
		Copyright &copy; 2007 - 2014 IOLA and Ole Laursen
	</div>

</body>
</html>