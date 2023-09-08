<html>
	<head>
		<title>Indoland Roleplay</title>
		<link rel="stylesheet" href="asset/style.css">

		<link rel="stylesheet" href="asset/slider/themes/default/default.css" type="text/css"/>
    <link rel="stylesheet" href="asset/slider/themes/light/light.css" type="text/css"/>
    <link rel="stylesheet" href="asset/slider/themes/dark/dark.css" type="text/css"/>
    <link rel="stylesheet" href="asset/slider/themes/bar/bar.css" type="text/css"/>
    <link rel="stylesheet" href="asset/slider/nivo-slider.css" type="text/css"/>

		<link rel="stylesheet" href="asset/slider/default/default.css" media="screen">
	</head>
	<body>

		<?php
		$page = (isset($_GET['page']) ? $_GET['page'] : NULL);
		$action = (isset($_GET['action']) ? $_GET['action'] : NULL);

		if($page !="" && $action !=""){
			include "page/$page-$action.php";
		}elseif($page != ""){
			include "page/$page.php";
		}else{
			include "page/home.php";
		}
		?>

		<script type="text/javascript" src="asset/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	</body>
</html>
