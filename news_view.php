<?php 
include ("blocks/bd.php"); /*����������� � �����*/
if (isset($_GET['id'])) {$id = $_GET['id'];}
include ("blocks/htmlent.php");
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM news WHERE id='$id'",$db);
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
"padding" : 20, // ������ �������� �� ����� ����
"imageScale" : false, // ��������� �������� true - �������(�����������) �������������� �� ������� ����, ��� false - ���� ������������ �� ������� ��������. �� ��������� - TRUE
			"zoomOpacity" : false,	// ��������� ������������ �������� �� ����� �������� (�� ��������� false)
			"zoomSpeedIn" : 1000,	// �������� �������� � �� ��� ���������� ���� (�� ��������� 0)
			"zoomSpeedOut" : 1000,	// �������� �������� � �� ��� ���������� ���� (�� ��������� 0)
			"zoomSpeedChange" : 1000, // �������� �������� � �� ��� ����� ���� (�� ��������� 0)
			"frameWidth" : 700,	 // ������ ����, px (425px - �� ���������)
			"frameHeight" : 600, // ������ ����, px(355px - �� ���������)
			"overlayShow" : true, // ���� true �������� �������� ��� ����������� �����. (�� ��������� true). ���� �������� � jquery.fancybox.css - div#fancy_overlay 
			"overlayOpacity" : 0.8,	 // ������������ ��������� 	(0.3 �� ���������)
			"hideOnContentClick" :false, // ���� TRUE  ��������� ���� �� ����� �� ����� ��� ����� (����� ��������� ���������). ����������� TRUE		
			"centerOnScroll" : false // ���� TRUE ���� ������������ �� ������, ����� ������������ ������������ ��������		
				
			});
		
		$("#menu a, .anim").hover( function() {
      $(this).animate({"paddingLeft" : "10px"}, 300)},
	  function() {$(this).animate({"paddingLeft" : "0"}, 300);
});

$("a.iframe").fancybox(
{								  
			"frameWidth" : 800,	 // ������ ����, px (425px - �� ���������)
			"frameHeight" : 600 // ������ ����, px(355px - �� ���������)
								  
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
<div class="center_header"><h1 class="header"><?php echo $myrow['title']; ?></div> 
<div class="scroll">
        <?php 
        
        echo $myrow['text']; ?>
        
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
