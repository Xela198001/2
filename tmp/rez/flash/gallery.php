<?php 
include ("blocks/bd.php"); /*Соединяемся с базой*/
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='gallery'",$db);
$myrow = mysql_fetch_array($result); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $myrow['title']; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
<link rel="shortcut icon" href="http://<? echo $_SERVER["SERVER_NAME"];?>/images/favicon.ico" type="image/x-icon" />
<link rel="icon" href="http://<? echo $_SERVER["SERVER_NAME"];?>/images/favicon.ico" type="image/x-icon" />
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
<div class="center_header"><h1 class="header"><?php echo $myrow['title']; ?></h1></div> 
<div class="scroll">
        <?php echo $myrow['text']; ?>
        
        <?php
        $result = mysql_query("SELECT id,foto,description,folder,title FROM gallery ORDER BY id",$db);
        $myrow = mysql_fetch_array($result);
        do { 
        printf ("<div id='gallery'>
        <a href='http://{$server}/gallery_view.php?id=%s' title='%s'><img src='http://{$server}/images/gallery/thumb/%s' alt='%s'></a><br/>
        </div>
        ", $myrow["id"],$myrow["title"], $myrow["foto"],$myrow["title"]); 
		  		  
}

while ($myrow = mysql_fetch_array ($result));
        
        ?> 
         <?php
 require ('imgresize.php');
     $foto_size = $_SERVER['DOCUMENT_ROOT']."/images/contact.jpg";
     $foto_thumb = $_SERVER['DOCUMENT_ROOT']."/images/gallery/thumb/contact.jpg";
  if (img_resize($foto_size, $foto_thumb, 100, 60))
    echo 'Миниатура фото создана';
  else
    echo 'Миниатура фото создана';
  

?>       
        </div>
</div>
</div>        
</div>
<div class="share42init" data-top1="150" data-top2="20" data-margin="50%" data-description="<? echo $myrow['meta_d']; ?>" data-url="http://<? echo $_SERVER["HTTP_HOST"],$_SERVER["REQUEST_URI"];?>"> data-title="<? echo $myrow['title']; ?>"></div>
<script type="text/javascript" src="http://<? echo $_SERVER["HTTP_HOST"];?>/share42/share42.js"></script>
<div class="footer">&nbsp;
<? include ("blocks/footer.php");        ?>  
</div>
</body>
</html>
