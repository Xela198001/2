<?php 
include ("blocks/bd.php"); /*Соединяемся с базой*/
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='news'",$db);
$myrow = mysql_fetch_array($result); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $myrow['title']; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="fancybox/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.gallery, a.iframe").fancybox();
		
url = $("a.modalbox").attr('href').replace("for_spider","content2");
$("a.modalbox").attr("href", url);	
$("a.modalbox").fancybox(
{								  
			"frameWidth" : 400,	 
			"frameHeight" : 400 
								  
});

			$("a.gallery2").fancybox(
			{						
"padding" : 20, // отступ контента от краев окна
"imageScale" : false, // Принимает значение true - контент(изображения) масштабируется по размеру окна, или false - окно вытягивается по размеру контента. По умолчанию - TRUE
			"zoomOpacity" : false,	// изменение прозрачности контента во время анимации (по умолчанию false)
			"zoomSpeedIn" : 1000,	// скорость анимации в мс при увеличении фото (по умолчанию 0)
			"zoomSpeedOut" : 1000,	// скорость анимации в мс при уменьшении фото (по умолчанию 0)
			"zoomSpeedChange" : 1000, // скорость анимации в мс при смене фото (по умолчанию 0)
			"frameWidth" : 700,	 // ширина окна, px (425px - по умолчанию)
			"frameHeight" : 600, // высота окна, px(355px - по умолчанию)
			"overlayShow" : true, // если true затеняят страницу под всплывающим окном. (по умолчанию true). Цвет задается в jquery.fancybox.css - div#fancy_overlay 
			"overlayOpacity" : 0.8,	 // Прозрачность затенения 	(0.3 по умолчанию)
			"hideOnContentClick" :false, // Если TRUE  закрывает окно по клику по любой его точке (кроме элементов навигации). Поумолчанию TRUE		
			"centerOnScroll" : false // Если TRUE окно центрируется на экране, когда пользователь прокручивает страницу		
				
			});
		
		$("#menu a, .anim").hover( function() {
      $(this).animate({"paddingLeft" : "10px"}, 300)},
	  function() {$(this).animate({"paddingLeft" : "0"}, 300);
});

$("a.iframe").fancybox(
{								  
			"frameWidth" : 800,	 // ширина окна, px (425px - по умолчанию)
			"frameHeight" : 600 // высота окна, px(355px - по умолчанию)
								  
});

		
		});
	</script>
	
</head>
<body>
<div class="contener">
<? include("blocks/header.php");   ?> 
<div class="content"> 
<? include ("blocks/left.php");  ?>   
<div id="center"> 
<div class="center_header"><h1 class="header">Новости</div> 
<div class="scroll">
        <?php 
$result_n = mysql_query("SELECT * FROM news ORDER BY date DESC",$db);
$myrow_n = mysql_fetch_array($result_n);
$server  = $_SERVER["HTTP_HOST"]; 
do { 
printf ("
        <div class='news_all'>
        <div class='news_p'><p>%s<p></div>
        <div class='news_text'>%s<br/>
        <a href='http://$server/news_view.php?id=%s' title='%s'>Посмотреть новость</a>
        </div></div>
        ",$myrow_n["title"],  $myrow_n["description"], $myrow_n["id"], $myrow_n["title"]); 
		  		  
}

while ($myrow_n = mysql_fetch_array ($result_n));
?>
        
        </div>
</div>
</div>        
</div>
<div class="share42init" data-top1="150" data-top2="20" data-margin="50%" data-description="<? echo $myrow['meta_d']; ?>" data-url="http://<? echo $_SERVER["HTTP_HOST"]."/".$_SERVER["REQUEST_URI"]."/";?>"> data-title="<? echo $myrow['title']; ?>"></div>
<script type="text/javascript" src="http://<? echo $_SERVER["HTTP_HOST"];?>/share42/share42.js"></script>
<div class="footer">&nbsp;
<?  include ("blocks/footer.php");        ?>  
</div>
</body>
</html>