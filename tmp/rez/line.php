<?php
$lines = file('http://svadba7ja.ru/all-svadba/stati-o-svadbe/');

foreach ($lines as $line_num => $line) 
{
    echo htmlspecialchars($line);
}
if(ini_get('allow_url_fopen')) {
    echo 'allow_url_fopen - включена. Данная директива включает поддержку упаковщиков URL (URL            wrappers), которые позволяют работать с объектами URL, как с обычными файлами.                   Упаковщики, доступные по умолчанию, служат для работы с удаленными файлами с                     использованием протокола ftp или http.';
} else { 
    echo 'Данная директива выключена и ни один удаленный файл открыть не удасться.';
}
?>