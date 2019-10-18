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

if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; $meta_d =htmlspecialchars($meta_d); if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; $meta_k =htmlspecialchars($meta_k); if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['menu']))        {$menu = $_POST['menu']; $menu =htmlspecialchars($menu); if ($menu == '') {unset($menu);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['menu_link']))        {$menu_link = $_POST['menu_link']; if ($menu_link == '') {unset($menu_link);}}
if (isset($_POST['menu_act']))      {$menu_act = $_POST['menu_act']; if ($menu_act == '') {unset($menu_act);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['page']))      {$page = $_POST['page']; if ($page == '') {unset($page);}}
if (isset($_POST['id']))      {$id = $_POST['id']; $id =htmlentities($id);}
if (isset($_POST['file'])) {$file = $_POST['file']; echo $file; echo $file_name;}

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
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($menu) && isset($menu_link) && isset($description) && isset($text) && isset($menu_act) && isset($page))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("INSERT INTO settings (id,title,meta_d,meta_k,description,menu,menu_link,menu_act,text,page) VALUES ('$id','$title', '$meta_d','$meta_k','$description','$menu','$menu_link','$menu_act','$text','$page')");

if ($result == 'true') {echo "<p>Страница успешно добалена!</p>";}
else {echo "<p>Страница не добалена!</p>";}


}		 
else 

{ echo mysql_error();
echo "<p>Вы ввели не всю информацию, поэтому страница в базу не может быть добалена.</p>";
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
