<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title']))       
{
$title = $_POST['title']; 

if ($title == '') 
{
unset($title);
}  

}

/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['menu']))        {$menu = $_POST['menu']; if ($menu == '') {unset($menu);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['menu_link']))        {$menu_link = $_POST['menu_link']; if ($menu_link == '') {unset($menu_link);}}
if (isset($_POST['menu_act']))      {$menu_act = $_POST['menu_act']; if ($menu_act == '') {unset($menu_act);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
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
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($menu) && isset($menu_link) && isset($description) && isset($text) && isset($menu_act))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("UPDATE settings SET title='$title', meta_d='$meta_d', meta_k='$meta_k', menu='$menu', description='$description', text='$text', menu_link='$menu_link', menu_act='$menu_act' WHERE id='$id'");

if ($result == 'true') {echo "<p>Страница успешно обновлена!</p>";}
else {echo "<p>Страница не обновлена!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому страница в базе не может быть обновлена.</p>";
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
