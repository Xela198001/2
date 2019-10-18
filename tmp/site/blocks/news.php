<?php 
$result_n = mysql_query("SELECT id,title,text_mini,text FROM news ORDER BY date DESC LIMIT 10 ",$db);
$myrow_n = mysql_fetch_array($result_n);
$server  = $_SERVER["HTTP_HOST"]; 
do { 
printf ("
        <p>%s<br/>
        <a  href='../news_full.php?id=%s' class='gallery' title='%s'>Подробнее</a><br>
        </p>
        ",$myrow_n["text_mini"], $myrow_n["id"], $myrow_n["title"], $myrow_n["id"], $myrow_n["text"]); 
		  		  
}

while ($myrow_n = mysql_fetch_array ($result_n));
?>
<br /><a href="news_all.php">Все новости</a>