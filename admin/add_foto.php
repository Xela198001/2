<?php 
include ("lock.php");
include ("blocks/bd.php");
if (strlen($_SERVER['REQUEST_URI']) > 255 || strpos($_SERVER['REQUEST_URI'], "eval") || (strpos($_SERVER['REQUEST_URI'], "CONCAT") > 0) || (strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") > 0 || (strpos($_SERVER['REQUEST_URI'], "base64") > 0))) 
{
        header("HTTP/1.1 414 Request-URI Too Long");
	header("Status: 414 Request-URI Too Long");
	header("Connection: Close");
	exit;
    }
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['folder']))        {$folder = $_POST['folder']; if ($folder == '') {unset($folder);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_GET['foto']))        {$foto = $_GET['foto']; if ($foto == '') {unset($foto);}}
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
         $result1 = mysql_query("SELECT id,folder FROM gallery WHERE id = '$id'",$db);
$myrow1 = mysql_fetch_array($result1);
$folder = $myrow1['folder'];
$id = $myrow1['id'];
$host = $_SERVER['DOCUMENT_ROOT'];
$array = array($host,'/images/gallery/foto/', $folder,'/');
$dir = implode("", $array);
echo $dir;
mkdir($dir,0777); 
$numoffiles = count($_FILES['file']['name']);
$i = 0;
for ($i = 0; $i < $numoffiles; $i++) {
    $link = $_FILES['file']['name'][$i];
    $link = str_replace(array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�'), array('a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'x', 'c', 'ch', 'sh', 'sch', 'j', 'j', 'y', 'e', 'y', 'ja', 'A', 'B', 'V', 'G', 'D', 'E', 'Jo', 'Zh', 'Z', 'I', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'X', 'C', 'Ch', 'Sh', 'Sch', 'J', 'J', 'Y', 'E', 'Y', 'Ja'), $link);
    echo $link;
    if ($link !== '') {
    $result1 = mysql_query ("INSERT INTO foto (id_gallery,file,folder) VALUES ('$id','$link','$folder')");
    move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT']."/images/gallery/foto/".$folder."/".$link);}
}
         /**
 * // ��������� �������� �� ����
 *    if(is_uploaded_file($_FILES['file']['tmp_name']))
 *    {
 *      // ���� ���� �������� �������, ���������� ���
 *      // �� ��������� ���������� � ��������
 *      
 * } else {
 *       $msg = "������ �������� �����";
 *       echo $_FILES['file']['tmp_name'];
 *    }
 */

  if ($result1 == 'true') {$msg ='<strong>���������� ���������</strong><br/><a href="add_comment.php?add=comment&id='.$id.'">�������� ����������� � �����������</a>'; 
  
  }
  else {$msg =
  '<strong>���������� �� ���������</strong><br/> ���������� ��� ���. ���� ������ ���������� ���������� � ��������������.';}
  echo '<p>'.$msg.'</p>';
		 
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>

</body>
</html>
