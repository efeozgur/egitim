<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kairos</title>
</head>
<style>
	.ana ul {list-style: none; border: 1px solid #ccc; margin:5px; width: 200px; height: 175px; display: block; background: #F6F7FF; float: left}
	.ana ul li{float:left;  padding: 5px}
	.ana ul li a{text-decoration: none; display: block; padding:5px; font-family: Tahoma; font-size: 12px}
	.ana ul li img {border-radius: 10px}
	.ana ul li a:hover {background: #ddd}
	.temizle {clear: both;}
</style>
<body>
	<?php 
		$site = file_get_contents('https://www.youtube.com/');
		$re = '/<a href="\/watch\?v=(.*?)"/is';
		$re2 = '/dir="ltr">(.*?)<\/a>/is';

		preg_match_all($re, $site, $sonuc);
		preg_match_all($re2, $site, $baslik);
		
		$kod = $sonuc[1];
		$bas = $baslik[1];

		
			
	?>

<div class="ana">
<?php for ($i=0; $i < 60; $i++) { ?>
<ul>
	<li><img src='http://img.youtube.com/vi/<?php echo $kod[$i] ?>/2.jpg'></li>
	<li><a href="https://www.youtube.com/watch?v=<?php echo $kod[$i]?>"><?php echo $bas[$i+1];?></a></li>
</ul>

	<?php }?>

</div>

	
	

</body>
</html>