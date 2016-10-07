<?php require('habervt.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript"> 
$(function(){
	
	$("img", this).mouseover(function(event) {
		var sonuc = $(this).attr('title');		
		$("a.dengesiz").eq(sonuc).slideDown('fast');
	}); 

	$("img", this).mouseout(function(event) {
		var sonuc = $(this).attr('title');		
		$("a.dengesiz").eq(sonuc).slideUp('fast');
	});
})
</script>

<style>
	ul {list-style: none;}
	ul li{margin:10px; padding: 10px; display: block; float: left; width: 200px; height: 250px}
	ul li img {border-radius: 5px}
	ul li a {text-decoration: none; padding:10px; display: block; color:lightblue; background: #efefef; color:black;}
	ul li a:hover {background: #ccc; color:#000;}
</style>
<body>


<div id="sonuc"></div>
<?php 
	$site = file_get_contents('http://www.haberler.com/teknoloji/');
	//$re = '/<a class="hbrListLink" href="(.*?)"/si';
	$re = '/<a class="hbrListLink" href="(.*?)" title="(.*?)">/';

	$re2 = '/<a class="hbrListLink" href="[a-zA-Z0-9\:\/\.\-]+" title="(.*?)"/si';
	$re3 = '/<a class="hbrListLink" href="[a-zA-Z0-9\:\/\.\-]+" title="(.*?)">\s+<div class="(.*?)"><img class="lazy" data-original="(.*?)"/si';
	preg_match_all($re, $site, $sonuc);
	preg_match_all($re2, $site, $basliksonuc);		
	preg_match_all($re3, $site, $resimsonuc);
	$haberBaslik = $sonuc[2];
	$link = $sonuc[1];
	$resim = $resimsonuc[3];

	echo "<ul>";

	

	for ($i=0; $i < count($link); $i++) { 

		

			echo "<li><a target='_blank' href='haberayrinti.php?link=$link[$i]'><img title='$i' width='175' src='$resim[$i]'></a> <br />"."<a class='dengesiz' style='display:none' title='$i' target='_blank' href='$link[$i]'>".$haberBaslik[$i]."</a></li>";

	
	}

	echo "</ul>";
 ?>
</body>
</html>