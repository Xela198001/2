<? include ("lock.php");  
if (isset($_POST['id'])) {$id = $_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Добавление новой фотографии</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
<script src='js/mf/jquery.js' type="text/javascript"></script>
<script src='js/mf/jquery.form.js' type="text/javascript" language="javascript"></script>
	<script src='js/mf/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='js/mf/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>
 <script src='js/mf/jquery.blockUI.js' type="text/javascript" language="javascript"></script>
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
        if ((!isset($id)) && ($id==0))
        {
            $result = mysql_query("SELECT id,title FROM gallery");      
            $myrow = mysql_fetch_array($result);
            echo "<p><form name='form1' method='post' action='new_foto.php' enctype='multipart/form-data'>
        
        <select size='1' name='id'>
	<option value='0'>- Выберте галерею -</option>";
            
            do 
{
printf ("<option value='%s'>%s</option>
        ",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));
echo "</select>
           <label>
           <input type='submit' name='submit' id='submit' value='Выбрать'>
           </label>
        </form></p>";
        }
        else {
            print <<<HERE
            <form name='form1' method='post' action='add_foto.php' enctype='multipart/form-data'>
       <p>Тип загружаемых файлов "png|gif|jpg"
       <br/>
       <input type="file" class="multi" name='file[]' accept="png|gif|jpg"/>
       <br/>
       <br/>
        <input name="id" type="hidden" value="$id">
            <input type='submit' value='Загрузить' />
            </form>
            </p>

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
