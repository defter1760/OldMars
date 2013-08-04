	<head>
		<style>
		.black_overlay{
			display: none;
			position: absolute;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background-color: black;
			z-index:1001;
			-moz-opacity: 0.8;
			opacity:.80;
			filter: alpha(opacity=80);
		}
		.white_content {
			display: none;
			position: absolute;
			top: 10%;
			left: 10%;
			width: 80%;
			height: 80%;
			padding: 3px;
			border: 1px solid black;
			background-color: white;
			z-index:1002;
			overflow: auto;
		}
	</style>
	</head>
	<body>
		<p>Click me <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">here</a></p>
		<div id="light" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Return to site</a>
<?PHP 
echo "<iframe name='iframe_content2' scrolling='yes' width='99%' height='95%' border='0' frameboarder='0' src='https://DFWMS01.initiativelegal.com/myform2.php'>";
	echo "</iframe>";
?></div>
		<div id="fade" class="black_overlay"></div>
	</body>
</html>
