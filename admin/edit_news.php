<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактирование новости</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="ckeditor/inclCkedit.js"></script>
<script type="text/javascript">
  function showOrHide(cb, cat) {
    cb = document.getElementById(cb);
    cat = document.getElementById(cat);
    if (cb.checked) cat.style.display = "block";
    else cat.style.display = "none";
  }
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
$result = mysql_query("SELECT title,id,text FROM news");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_news.php?id=%s'>%s </a>
        </p>
        ",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM news WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name="form1" method="post" action="update_news.php">
         <p>
           <label>Название новости (title):<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="170">
             </label>
         </p>
         <p>
           <label>Краткое описание новости(meta description):<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
           </label>
         </p>
         <p>
           <label>Ключевые слова для новости (meta keywords):<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="170">
           </label>
         </p>
         <p>
           <label>Короткий текст новости(отображается в разеле новости на всех страницах сайта)<br>
           <textarea name="text_mini" id="text_mini" cols="125" rows="10">$myrow[text_mini]</textarea>
           </label>
         </p>
         <p>
           <label>Дата в формате 2014-08-27 (г-м-д))<br>
           <input value="$myrow[date]" type="text" name="date" id="date">
           </label>
         </p>
         <p>
           <label>Краткое описание новости: <br/>
           <textarea name="description" id="description" cols="125" rows="10">$myrow[description]</textarea>
           <script type='text/javascript'>
			var editor = CKEDITOR.replace( 'description', {
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
