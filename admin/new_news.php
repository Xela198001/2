<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>���������� ����� ��������</title>
<link href="style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="ckeditor/inclCkedit.js"></script>
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
       <form name="form1" method="post" action="add_news.php">
         <p>
           <label>�������� ������� (title):<br>
             <input value="" type="text" name="title" id="title" size="170">
             </label>
         </p>
         <p>
           <label>������� �������� �������(meta description):<br>
           <input value="" type="text" name="meta_d" id="meta_d" size="170">
           </label>
         </p>
         <p>
           <label>�������� ����� ��� ������� (meta keywords):<br>
           <input value="" type="text" name="meta_k" id="meta_k" size="170">
           </label>
         </p>
         <p>
           <label>�������� ����� (��� ������ ������� ��� ����):<br>
             <input value="" type="text" name="text_mini" id="text_mini" size="170">
             </label>
         </p>
         <p>
           <label>������� �������� �������: <br/>
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
           <label>������ ����� �������: <br/>
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
           <input type="submit" name="submit" id="submit" value="������� ������� � ����">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
