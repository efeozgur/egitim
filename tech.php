<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Teknoloji</title>
</head>
<style>
	.hava { height:200px;width: 410px; }
	.hava ul { padding:10px; list-style: none; float:left; border:1px solid #eee; margin:10px;}
	.hava ul li{font-family: Verdana; font-size:12px;}
</style>
<body>
<?php 
	$site	=	file_get_contents('http://www.havadurumux.net/burdur-hava-durumu/');
	//$re = '/<h1>[a-zA-Z]+<\/h1>\s+<p><a href="(.*?)">(.*?)<\/a>/is';
	$re = '/<div class="gelen">\s+<h3>(.*?)<\/h3>\s+<h4>(.*?)<\/h4>\s+<img src="(.*?)" title=[\"]+\s+alt=[\"]+\s+\/>\s+<p>(.*?)<\/p>\s+<div class="dder">(.*?)<span>(.*?)<\/span><\/div>\s+<span class="durum">(.*?)<\/span>\s+<\/div>/is';
	//preg_match_all($re, $site, $sonuc);
	preg_match_all($re, $site, $tarih);

	$gun = $tarih[1];
	$date = $tarih[2];
	$resim = $tarih[3];
	$durum = $tarih[4];
	$enyend = $tarih[5];
	$derece = $tarih[6];
	$hisssedilen = $tarih[7];

?>
<section> <h2>Burdur Hava Durumu</h2>
<div class="hava">
<?php 
	for ($i=0; $i < count($gun); $i++) { 
	
?>
	<ul>
		<li><?php echo $gun[$i] ?></li>
		<li><?php echo $date[$i] ?></li>
		<li><?php echo "<img width='50' src='$resim[$i]'>"; ?></li>
		<li><?php echo $durum[$i]; ?></li>
		<li><?php echo $enyend[$i].":".$derece[$i]; ?></li>
		<li><?php echo $hisssedilen[$i] ?></li>

	</ul>
<?php }?>
</div>
</section>
</body>
</html>