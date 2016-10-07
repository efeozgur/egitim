<?php require('vt.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">


		function ozgur(){
           
				var ad = $("input[name=ad]").val();
				var soyad = $("input[name=soyad]").val();
				var eposta = $("input[name=eposta]").val();
				var tel = $("input[name=tel]").val();

				var degerler = "ad="+ad+"&soyad="+soyad+"&eposta="+eposta+"&tel="+tel; 

				$.ajax({
					type:"POST",
					url:"kaydet.php",
					data:degerler, 
					success: function(){
						$("#sonuc").text("kayıt yapıldı");
						$("#sonuc").show().delay(1000).fadeOut("fast");
						$("input[type=text], textarea").val("");
						$("input[name=ad]").focus();
					}
				})


		}

	</script>	
	<style type="text/css">
		.kayit ul {list-style:none;}
	</style>
</head>
<body>
<div class="kayit">
<form action="kaydet.php" method="post" onsubmit="return false;">	
	<ul>
		<li><input name="ad" type="text"></li>
		<li><input type="text" name="soyad"></li>
		<li><input type="text" name="eposta"></li>
		<li><input type="text" name="tel"></li>
		<li><input type="submit" value="kaydet" onclick="ozgur()"></li>
	</ul> 
</form>	
</div>
<div id="sonuc"></div>
</body>
</html>