<?php

if (isset($_POST['email']))
				$email = $_POST['email'];
if (isset($_POST['pass']))
				$pass = $_POST['pass'];
$url = "add_reklamodatel.php";
$robokassa = "http://robokassa.ru";
$title = "www.svadba7ja.ru"; //адрес вашего сайта
$subject = "Письмо с сайта $title, ВНИМАНИЕ!!! введена инъекция"; //Тема отправляемых вам сообщений
$admail = "mes-aleksandr@yandex.ru"; //Ваш e-mail, на который будут отправляться письма
$back = '<p><a href=\'javascript: history.back()\'>Назад</a></p>';
$header .= "Content-type: text/plain; charset=\"Windows-1251\""; //Кодировка для почты
//То что отправляется на почту продавца
$content = "\n Пользователь $email\n
Город: $pass

//Вывод сообщений после отправки запроса с формы заказа
";
mail($admail, $subject, $content, $header);
echo $back;

?>