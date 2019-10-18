<?php 
include ("lock.php");
include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Страница удаления галереи</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="1270" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="1270" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
 
          <p><strong>Выберите галерею для удаления          </strong></p>
          <form action="drop_gallery.php" method="post"  >
<? 

$result = mysql_query("SELECT title,id,foto,folder FROM gallery");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><input name='id' type='radio' value='%s'><label> %s, фото галереи: %s, папка галереи: %s</label></p>",$myrow["id"],$myrow["title"],$myrow["foto"],$myrow["folder"]);
}

while ($myrow = mysql_fetch_array($result));
?>

<p><input name="submit" type="submit" value="Удалить галерею!!!" onClick="return confirm('Вы подтверждаете удаление?');"/></p>

</form>
//<?
//  $path = $_SERVER["DOCUMENT_ROOT"]."images/foto/g1/";
//  echo $path;
//  ?>
//<div id="featured">
//<?php
//				$featured_dir = '../images/foto/g1/';
//				$scan = scandir($featured_dir);
//				echo '<img src="'. $featured_dir . $scan[2] . '" alt="image" />';
//			?>
//</div>
//<ul id="options">
//<?php
//			$dir = '../images/foto/g1/';
//			$scan = scandir($dir);
//
//			for ($i=0; $i<count($scan); $i++) {
//			 if ($scan[$i] != '.' && $scan[$i] != '..') {
//			 echo '
//<li>
//<a href="' . $featured_dir . $scan[$i] . '">
//<img src="'. $dir . $scan[$i] . '" alt="'. $scan[$i] . '" />
//</a>
//</li>';
//			 }
//			}
		?>
</ul>
</div>
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
