<?php 
$result_m = mysql_query("SELECT menu_link,menu FROM settings WHERE menu_act='1' ORDER BY id",$db);
$myrow_m = mysql_fetch_array($result_m);
$server  = $_SERVER["HTTP_HOST"]; 
echo '<ul class="cssmenu">';
do { 
printf ("<li>
        <a href='http://{$server}/%s'>%s</a>
        </li>
        ", $myrow_m["menu_link"], $myrow_m["menu"]); 
		  		  
}

while ($myrow_m = mysql_fetch_array ($result_m));
echo "</ul>";
?>
