<?php 
include ("lock.php");
include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Страница удаления фото</title>
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
 
          <p><strong>Выберите фото для удаления          </strong></p>
          <form action="drop_news.php" method="post"  >
<? 


echo "<p><table border='1' cellpadding='4' cellspacing='0'>
<tr>
	<td>Фото</td>
	<td>Действие</td>
</tr>
";
    $result_g = mysql_query("SELECT title,id FROM gallery ");      
$myrow_g = mysql_fetch_array($result_g);
do {
    $id_gallery = $myrow_g['id'];
    echo "<td colspan='2'>{$myrow_g['title']}</td>";
    $result = mysql_query("SELECT description,id,folder,file FROM foto WHERE id_gallery='$id_gallery'");      
$myrow = mysql_fetch_array($result);
do 
{ 
    if ($myrow['description'] == '') {$desc = 'фото'.$myrow['id'];}
    else {$desc = $myrow["description"]; }
printf ("<tr>
	<td>
<a class='thumbnail' href='#'>{$desc}<span><img src='../images/gallery/foto/%s/%s' width='500'/></span>&nbsp;&nbsp;&nbsp;</a></td><td><a href='drop_foto.php?id=%s'>Удалить</a></td></tr>",$myrow["folder"],$myrow["file"],$myrow["id"]);
}

while ($myrow = mysql_fetch_array($result));
}
while ($myrow_g = mysql_fetch_array($result_g));
?>
</table></p>
       
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
