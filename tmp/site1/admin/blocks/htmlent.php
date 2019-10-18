<?php
$id = htmlentities($id, ENT_QUOTES);
$t=gettype($id); 
if ($t=='integer') {$id = $id; }
else {echo "Не указан id";}
?>