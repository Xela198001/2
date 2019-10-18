<?php 
include ("blocks/bd.php"); /*Соединяемся с базой*/
if (isset($_GET['id'])) {$id = $_GET['id'];} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Новости</title>
</head>

<body>

<?php 
$result_n = mysql_query("SELECT id,title,text_mini,text FROM news WHERE id='$id' ",$db);
$myrow_n = mysql_fetch_array($result_n);
$server  = $_SERVER["HTTP_HOST"]; 
do { 
printf ("<h1>%s</h1>
        <p>%s
        </p>
        ",$myrow_n["title"], $myrow_n["text"]); 
		  		  
}

while ($myrow_n = mysql_fetch_array ($result_n));
?>

</body>
</html>