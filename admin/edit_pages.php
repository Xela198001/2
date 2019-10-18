<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактирование страницы</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="ckeditor/inclCkedit.js"></script>
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
      
<? 

if (!isset($id))

{echo "<p><table class='t_page'>
<tr>
	<td>№</td>
	<td>Название страницы</td>
	<td>Ссылка</td>
	<td></td>
</tr>";


$result = mysql_query("SELECT title,id,menu_link FROM settings ORDER BY id");      
$myrow = mysql_fetch_array($result);

do 
{ $link = 'http://'.$_SERVER["HTTP_HOST"].'/'.$myrow['menu_link'];
printf ("<tr>
	<td>%s</td>
	<td>%s</td>
	<td><a href='{$link}' target='_blank'>{$link}</a></td>
	<td><a href='edit_pages.php?id=%s'>Редактировать</a></td>
</tr>",$myrow["id"],$myrow["title"],$myrow["id"]);
}

while ($myrow = mysql_fetch_array($result));
echo "</table></p>";
}

else

{

$result = mysql_query("SELECT * FROM settings WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name="form1" method="post" action="update_pages.php">
         <p>
           <label>Название страницы (title):<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="170">
             </label>
         </p>
         <p>
           <label>Краткое описание страницы(meta description):<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" size="170">
           </label>
         </p>
         <p>
           <label>Ключевые слова для страницы (meta keywords):<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="170">
           </label>
         </p>
         <p>
           <label>Название в меню<br>
           <input value="$myrow[menu]" name="menu" type="text" id="menu">
           </label>
         </p>
         <p>
           <label>Ссылка для меню<br>
           <input value="$myrow[menu_link]" type="text" name="menu_link" id="menu_link">
           </label>
         </p>
         <p>
           <label>Активировать в меню(0 - не активно, 1 - активно)<br>
           <input value="$myrow[menu_act]" type="text" name="menu_act" id="menu_act">
           </label>
         </p>
         <p>
           <label>Краткое описание страницы: <br/>
           <textarea name="description" id="description" cols="125" rows="10">$myrow[description]</textarea>
           <script>
            CKEDITOR.replace( 'description' );
        </script>
           </label>
         </p>
         <p>
           <label>Текст страницы: <br/>
           <textarea name="text" id="text" cols="125" rows="50">$myrow[text]</textarea>
           <script type='text/javascript'>
			var editor = CKEDITOR.replace( 'text', {
				filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
		</script>

           </label>
         </p>
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>



HERE;
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
