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
<script language="javascript" type="text/javascript" src="js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu",
	theme_advanced_buttons1_add_before : "save,separator",
	theme_advanced_buttons1_add : "fontselect,fontsizeselect",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
	theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
	theme_advanced_buttons3_add_before : "tablecontrols,separator",
	theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
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

{
$result = mysql_query("SELECT title,id FROM settings");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_pages.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

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
           </label>
         </p>
         <p>
           <label>Текст страницы: <br/>
           <textarea name="text" id="text" cols="125" rows="50">$myrow[text]</textarea>
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
