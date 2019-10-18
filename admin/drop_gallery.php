<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Обработчик</title>
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
      
         <?php 
if (isset($id))
{
  $result_del = mysql_query("SELECT folder FROM gallery WHERE id='$id'");      
$myrow_del = mysql_fetch_array($result_del);
$result = mysql_query ("DELETE FROM gallery WHERE id='$id'");

if ($result == 'true') {echo "<p>Галерея успешно удалена!</p>";
$path = $_SERVER["DOCUMENT_ROOT"]."/images/gallery/foto/".$myrow_del['folder']."/";
$files = array_slice(scandir($path),2); // получаем файлы из директории
foreach ($files as $file) {
    $path_del = $_SERVER["DOCUMENT_ROOT"]."/images/gallery/foto/".$myrow_del['folder']."/".$file;
    if (file_exists($path_del)) unlink($path_del);
     echo $path_del."<br/>";
}
rmdir($path);
}
else {echo "<p>Галерея не удалена!</p>";}




}		 
else 

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить галерею невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
}
		 
		 
		 
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
<script language="JavaScript" type="text/javascript">
<!-- 
function Go(){ 
 location="index.php"; 
} 
setTimeout( 'Go()', 1000 ); 
//--> 
</script>
</body>
</html>
