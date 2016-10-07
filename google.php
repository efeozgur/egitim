<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google</title>
	<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
</head>
<style type="text/css">
	.haber {
		width: 1000px;
	}
	.haber ul {
		list-style: none;
		border:1px solid #ddd;
		background: ##E6E6E6;
		float:left;
		width: 400px;
		height: 350px;
		margin:10px;
	}

	.haber ul li h1 {
		background: #F2F9E6;
		padding: 5px;
		color:#fff;
		font-family: Verdana;
		font-size: 18px;
	}
	
	.haber ul li a{
		color:#000;
		text-decoration: none
	}

</style>
<body>
	<?php 
		$site = file_get_contents('http://www.haberciler.com/');
		$re = '/"image"><a href="(.*?)" title="(.*?)"(.*?)src="(.*?)" longdesc="(.*?)" alt="(.*?)"(.*?)spot">(.*?)">(.*?)<\/a>/si';
		preg_match_all($re, $site, $sonuc);
		
		$baslik = $sonuc[2];
		$link = $sonuc[1];
		$resim = $sonuc[4];
		$makale = $sonuc[9];
	
for ($i=0; $i < count($baslik); $i++) { 
	
	?>

<div class="haber">
	<ul>
	  	<li><?php echo "<h1><a href='$link[$i]'>". $baslik[$i] ."</a></h1>"; ?></li>
	  	<li><?php echo "<img src='$resim[$i]'>"; ?></li>
	  	<li><?php echo "<h4>". $makale[$i] ."</h4>"; ?></li>
	 </ul>  
</div>
	
<?php }?>
</body>
</html>