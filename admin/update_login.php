<?php 
include ("lock.php");
include ("blocks/bd.php");

/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, �� �� ������� ������� ���������� �� ��. ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['pass']))      {$pass = $_POST['pass']; if ($pass == '') {unset($pass);}}
if (isset($_POST['login']))      {$login = $_POST['login']; if ($login == '') {unset($login);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>����������</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="1270" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--���������� ����� �����-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="1270" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--���������� ����� ���� �����-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
         <?php 
if (isset($login) && isset($pass))
{
$passwd = $pass;
$patz = md5($passwd);
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE userlist SET user='$login', pass='$patz' WHERE id='$id'");

if ($result == 'true') {echo "<p>����� � ������ ���������!</p>";}
else {echo "<p>����� � ������ �� ���������!</p>";}


}		 
else 

{
echo "<p>�� ����� �� ��� ����������, ������� ����� � ������ � ���� �� ����� ���� ���������.</p>";
}
	 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
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
