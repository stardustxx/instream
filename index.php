<!DOCTYPE HTML5>
<html>
<head>
	<title>InStream</title>
	<meta charset="utf-5">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/app.js" type="text/javascript"></script>
	<script src=js/instafeed.js type="text/javascript"></script>
	<link res="stylesheet" href="css/app.css">
	<link res="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript">
		var feed = new Instafeed({
        	get: 'tagged',
        	tagName: 'awesome',
        	clientId: 'ad21e02365f64f63a05a4cc31b5306d3'
    	});
    	feed.run();
	</script>
</head>
<body>
	<div id="container">
		<div id="instafeed">
		</div>
	</div>
</body>
</html>