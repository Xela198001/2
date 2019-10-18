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

if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['folder']))        {$folder = $_POST['folder']; if ($folder == '') {unset($folder);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['foto']))        {$foto = $_POST['foto']; if ($foto == '') {unset($foto);}}


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
         $host = $_SERVER['DOCUMENT_ROOT'];
$array = array($host,'/images/gallery/foto/', $folder,'/');
$dir = implode("", $array);
mkdir($dir,0777); 
         if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/images/gallery/".$folder."_".$_FILES["filename"]["name"]);
     $foto = $folder."_".$_FILES["filename"]["name"];
   } else {
      echo("Ошибка загрузки файла");
   }

if (isset($title) && isset($meta_d) && isset($meta_k) && isset($folder) && isset($description) && isset($text))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("INSERT INTO gallery (title,meta_d,meta_k,description,folder,text,foto) VALUES ('$title', '$meta_d','$meta_k','$description','$folder','$text','$foto')");

if ($result == 'true') {echo "<p>Галерея успешно добалена!</p>";}
else {echo "<p>Галерея не добалена!</p>";}


}		 
else 

{ echo mysql_error();
echo "<p>Вы ввели не всю информацию, поэтому галерея в базу не может быть добалена.</p>";
}
		 
		 
		 
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>

</body>
</html>
