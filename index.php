<!DOCTYPE HTML5>
<html>
<head>
	<title>InStream</title>
	<meta charset="utf-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/masonry.js" type="text/javascript"></script>
	<script src="js/app.js" type="text/javascript"></script>
	<script src="components/webcomponentsjs/webcomponents.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="import" href="components/paper-button/paper-button.html">
	<link rel="import" href="components/core-toolbar/core-toolbar.html">
	<link rel="import" href="components/core-icon/core-icon.html">
	<link rel="import" href="components/core-icon-button/core-icon-button.html">
	<link rel="import" href="components/paper-icon-button/paper-icon-button.html">
	<link rel="import" href="components/paper-input/paper-input.html">
	<link rel="import" href="components/paper-toast/paper-toast.html">
    <link rel="import" href="components/paper-shadow/paper-shadow.html">
    <link rel="import" href="components/paper-elements/paper-elements.html">
    <link rel="import" href="components/paper-ripple/paper-ripple.html">
    <link rel="import" href="components/core-header-panel/core-header-panel.html">
</head>
<body>
    <core-header-panel mode = "seamed">
        <core-toolbar id = "mainHeader">
            <span flex>InStream</span>
            <paper-icon-button raised icon="refresh" onclick="updatepage()"></paper-icon-button>
            <paper-input id = "search" label = "Enter a search tag" value = "instadaily"></paper-input>
        </core-toolbar>
    
	
        <div id = "beaker" class = "tbCenter">
            <!-- <section id="sform">
                <input type="text" id="search" name="search" class="searchField form-control" placeholder="Enter a search tag">
            </section> -->
            <div id="container" class="js-masonry container-fluid tbCenter">
            </div>
            <div id = "toast">
                <paper-toast id = "toast1" text = "Fetching results"></paper-toast>
                <paper-toast id = "toast2" text = "Please type something to search"></paper-toast>
            </div>
        </div>
    </core-header-panel>
</body>
</html>
