<? include ("lock.php");  
if (isset($_GET['add']))      {$add = $_GET['add']; $add =htmlspecialchars($add); if ($add == '') {unset($add);}}
if (isset($_GET['folder']))      {$folder = $_GET['folder']; $folder =htmlspecialchars($folder); if ($folder == '') {unset($folder);}}
if (isset($_POST['id'])) {$id=$_POST['id'];}
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($_POST['description'])) {$description=$_POST['description'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Добавление новой страницы</title>
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
<? include ("blocks/lefttd.php"); ?>
<td valign="top">       
    <?    if ($add=='comment') {
        echo '<form name="form1" method="post" action="add_comment.php?add=add">';
        $result_n = mysql_query("SELECT * FROM foto WHERE id_gallery='$id'",$db);
        $myrow_n = mysql_fetch_array($result_n);
        $server  = $_SERVER["HTTP_HOST"]; 
        do { 
            $id = $myrow_n["id"];
            $description = $myrow_n["description"];
        printf ("
        <p>
        <img src='http://{$server}/images/gallery/foto/%s/%s' width='150px'/><br>
        
           <label>Комментарий к фото:<br>
             <input value='$description' type='text' name='description[]' id='title' size='170'>
             <input name='id[]' type='hidden' value='$id'>
             </label>
         </p>
        ",$myrow_n["folder"], $myrow_n["file"]); 
        
		  		  
}

while ($myrow_n = mysql_fetch_array ($result_n));
echo "<p><input type='submit' value='Добавить комментарии' /></p></form>";
}
if ($add=='add') { 
    $num = count($id);
    for ($x=0; $x<$num+1; $x++) {
    $id_foto = $id[$x];
    $coment = $description[$x];
    echo $id_foto.', '.$coment;
    $result = mysql_query ("UPDATE foto SET description='$coment' WHERE id='$id_foto'");

    if ($result == 'true') { echo "<p>Комментарии добавлены!</p>";}
else {echo "<p>Комментарии не добавлены!</p>";}
}
    
}
       ?>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
