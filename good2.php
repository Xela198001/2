<?php

if (isset($_POST['email']))
				$email = $_POST['email'];
if (isset($_POST['pass']))
				$pass = $_POST['pass'];
$url = "add_reklamodatel.php";
$robokassa = "http://robokassa.ru";
$title = "www.svadba7ja.ru"; //����� ������ �����
$subject = "������ � ����� $title, ��������!!! ������� ��������"; //���� ������������ ��� ���������
$admail = "mes-aleksandr@yandex.ru"; //��� e-mail, �� ������� ����� ������������ ������
$back = '<p><a href=\'javascript: history.back()\'>�����</a></p>';
$header .= "Content-type: text/plain; charset=\"Windows-1251\""; //��������� ��� �����
//�� ��� ������������ �� ����� ��������
$content = "\n ������������ $email\n
�����: $pass

//����� ��������� ����� �������� ������� � ����� ������
";
mail($admail, $subject, $content, $header);
echo $back;

?>