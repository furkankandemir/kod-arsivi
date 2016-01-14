<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Furkan Kandemir - PHP ile Anında Önizlemeli Arama Formu | Kandemir.co</title>
	<link rel="stylesheet" href="style.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#sonuclar").hide();
			// Tıklandığında işlem  yapması için...
			$(".input").keyup(function(){
				// Girilen veriyi alma
				var value = $(this).val();
				var deger = "value="+value;
				$.ajax({
					type: "POST",
					url: "post.php",
					data: deger,
					success: function(cevap){
						if(cevap == "yok"){
							$("#sonuclar").show().html("");
							$("#sonuclar").html("Hiç bir sonuç bulunamadı!!");
						}else if(cevap == "bos"){
							$("#sonuclar").hide();
						}else {
							$("#sonuclar").show();
							$("#sonuclar").html(cevap);
						}
					}	
				})
			});
		});
	</script>
</head>
<body>
	<div id="dis-div">
		<input type="text" name="furkankandemir" class="input"/>
		<div id="sonuclar"><ul></ul></div>
	</div>
</body>
</html>
