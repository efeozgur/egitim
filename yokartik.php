<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Yook Artık</title>
	<!--<link rel="stylesheet" type="text/css" href="css/tasarim.css">-->
</head>
<style type="text/css">
	ul  {
		border:1px solid #E6E6E6;
		float:left;
		margin:10px;
		padding:5px;
		-webkit-box-shadow: 0px 14px 18px -8px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 14px 18px -8px rgba(0,0,0,0.75);
		box-shadow: 0px 14px 18px -8px rgba(0,0,0,0.75);
		width: 300px;height: 200px;
		background: rgba(231,56,39,0.44);
		background: -moz-linear-gradient(left, rgba(231,56,39,0.44) 0%, rgba(240,47,23,0.32) 48%, rgba(246,41,12,0.26) 73%, rgba(255,255,255,0.19) 100%);
		background: -webkit-gradient(left top, right top, color-stop(0%, rgba(231,56,39,0.44)), color-stop(48%, rgba(240,47,23,0.32)), color-stop(73%, rgba(246,41,12,0.26)), color-stop(100%, rgba(255,255,255,0.19)));
		background: -webkit-linear-gradient(left, rgba(231,56,39,0.44) 0%, rgba(240,47,23,0.32) 48%, rgba(246,41,12,0.26) 73%, rgba(255,255,255,0.19) 100%);
		background: -o-linear-gradient(left, rgba(231,56,39,0.44) 0%, rgba(240,47,23,0.32) 48%, rgba(246,41,12,0.26) 73%, rgba(255,255,255,0.19) 100%);
		background: -ms-linear-gradient(left, rgba(231,56,39,0.44) 0%, rgba(240,47,23,0.32) 48%, rgba(246,41,12,0.26) 73%, rgba(255,255,255,0.19) 100%);
		background: linear-gradient(to right, rgba(231,56,39,0.44) 0%, rgba(240,47,23,0.32) 48%, rgba(246,41,12,0.26) 73%, rgba(255,255,255,0.19) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e73827', endColorstr='#ffffff', GradientType=1 );
	}
</style>
<body>

<?php 
	$site = file_get_contents('https://galeri.yookartik.com');

	//$re = '/<ul class="bugun mat">(.*?)<li>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)<\/span>(.*?)<\/li>(.*?)<li><span>(.*?)(.*?)<\/span>(.*?)<\/li>/si';
	//$re = '/<\/ul><ul class="bugun mat">(.*?)<\/ul>/si';
	$re = '/<div id="fotoblok"(.*?)<a href="(.*?)" title="(.*?)"><img src="(.*?)" (.*?)<\/div>(.*?)href="(.*?)">(.*?)<\/a><\/div>/si';
	preg_match_all($re, $site, $sonuc);

/*
	echo "<code>";
	print_r(iconv("windows-1254", "UTF-8",$sonuc[8][2]));
	echo "</code>";
*/
	$resim = $sonuc[4];
	$bozukbaslik = $sonuc[3];
	$link =  $sonuc[7];
	//print_r($sonuc);

	
	for ($i=0; $i < count($bozukbaslik); $i++) { 
		//echo "<h1>".iconv("windows-1254","utf-8", $bozukbaslik[$i])."</h1><br><br>";
	//	echo "<img width='300' src='http://galeri.yookartik.com/$resim[$i]'><br>";
	



?>
<div>
		<?php //echo "<h5 style='padding:10px'>".iconv("windows-1254","utf-8", $bozukbaslik[$i]); ?>
		<?php //echo "<a target='_blank' href='http://galeri.yookartik.com/$link[$i]'><img style='padding:10px; border:1px solid #ddd; border-radius:5px;' width='180' src='http://galeri.yookartik.com/$resim[$i]'></a><br>"; ?>

<ul style="list-style: none;">
	<li><?php echo "<h5 style='padding:10px'>".iconv("windows-1254","utf-8", $bozukbaslik[$i]); ?></li>
	<li><?php echo "<a target='_blank' href='http://galeri.yookartik.com/$link[$i]'><img class='haberdetayresim' style='padding:10px; border:1px solid #ddd; border-radius:5px;' width='180' src='http://galeri.yookartik.com/$resim[$i]'></a>";?> </li>
</ul>
</div>		

<?php }?>
</body>
</html>