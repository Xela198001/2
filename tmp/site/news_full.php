<?php 
include ("blocks/bd.php"); /*Соединяемся с базой*/
if (isset($_GET['id'])) {$id = $_GET['id'];} 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="ivan2" />

	<title>Неназванный 2</title>
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