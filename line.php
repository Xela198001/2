<?php
$lines = file('http://svadba7ja.ru/all-svadba/stati-o-svadbe/');

foreach ($lines as $line_num => $line) 
{
    echo htmlspecialchars($line);
}
if(ini_get('allow_url_fopen')) {
    echo 'allow_url_fopen - ��������. ������ ��������� �������� ��������� ����������� URL (URL            wrappers), ������� ��������� �������� � ��������� URL, ��� � �������� �������.                   ����������, ��������� �� ���������, ������ ��� ������ � ���������� ������� �                     �������������� ��������� ftp ��� http.';
} else { 
    echo '������ ��������� ��������� � �� ���� ��������� ���� ������� �� ��������.';
}
?>