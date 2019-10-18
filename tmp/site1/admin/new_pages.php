<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Добавление новой страницы</title>
<link href="style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
       <form name="form1" method="post" action="add_pages.php">
       <p>
           <label>Номер страницы (id):<br>
             <input value="" type="text" name="id" id="id" size="5">
             </label>
         </p>
         <p>
           <label>Название страницы (title):<br>
             <input value="" type="text" name="title" id="title" size="170">
             </label>
         </p>
         <p>
           <label>Название страницы (на английском без пробелов макс 50 символов):<br>
           Это название будет использоватся в ссылке на страницу<br />
             <input value="" type="text" name="page" id="page" size="50">
             </label>
         </p>
         <p>
           <label>Краткое описание страницы(meta description):<br>
           <input value="" type="text" name="meta_d" id="meta_d" size="170">
           </label>
         </p>
         <p>
           <label>Ключевые слова для страницы (meta keywords):<br>
           <input value="" type="text" name="meta_k" id="meta_k" size="170">
           </label>
         </p>
         <p>
           <label>Название в меню<br>
           <input value="" name="menu" type="text" id="menu">
           </label>
         </p>
         <p>
           <label>
           <input value="page.php" type="hidden" type="text" name="menu_link" id="menu_link">
           </label>
         </p>
         <p>
           <label>Активировать в меню(0 - не активно, 1 - активно)<br>
           если страница не будет использоватся в меню, то ссылка на страницу будет иметь вид page.php?page=дальше без пробела Название страницы (напрмер: http://mysite.ru/page.php?page=video)<br />
           <input value="" type="text" name="menu_act" id="menu_act">
           </label>
         </p>
         <p>
           <label>Краткое описание страницы: <br/>
           <textarea name="description" id="description" cols="125" rows="10"></textarea>
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
           <textarea name="text" id="text" cols="125" rows="50"></textarea>
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
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести странцу в базу">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
