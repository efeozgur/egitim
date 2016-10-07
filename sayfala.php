<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sayfalama Mantığı</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(function(){

		});
	</script>
</head>

<style type="text/css">

	.sayfalama ul  {list-style: none}
	.sayfalama ul li {float: left; border:1px solid #ddd; margin-right: 10px}
	.sayfalama ul li a{text-decoration: none; padding:25px; display: block;}
	.sayfalama ul li a:hover{background: #000; color: white}
	.aktif {background: red}	

	.sayfalar ul {list-style: none}
	.sayfalar ul li {float:left; margin:10px;}
	.temizle {clear: both;}
</style>
<body>

<?php 

	for ($i=0; $i < 20; $i++) { 
			echo "selamla"."<br>";
		}	
?>

<div class="sayfalar">
	<ul>
		<li>Birinci</li>
		<li>İkinci</li>
		<li>Üçüncü</li>
		<li>Dördüncü</li>
		<li>Beşinci</li>
	</ul>
</div>
<div class="temizle"></div>
<div class="sayfalama">
	<ul>
		<li><a class="aktif" href="">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
		<li><a href="">4</a></li>
		<li><a href="">5</a></li>
	</ul>
</div>
</body>
</html>