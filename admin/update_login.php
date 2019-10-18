<?php 
include ("lock.php");
include ("blocks/bd.php");

/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['pass']))      {$pass = $_POST['pass']; if ($pass == '') {unset($pass);}}
if (isset($_POST['login']))      {$login = $_POST['login']; if ($login == '') {unset($login);}}
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
if (isset($login) && isset($pass))
{
$passwd = $pass;
$patz = md5($passwd);
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("UPDATE userlist SET user='$login', pass='$patz' WHERE id='$id'");

if ($result == 'true') {echo "<p>Логин и пароль обновлены!</p>";}
else {echo "<p>Логин и пароль не обновлены!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому логин и пароль в базе не могут быть обновлены.</p>";
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
