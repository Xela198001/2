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
$result = mysql_query ("DELETE FROM settings WHERE id='$id'");

if ($result == 'true') {echo "<p>Страница успешно удалена!</p>";}
else {echo "<p>Страница не удалена!</p>";}


}		 
else 

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить страницу невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
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
