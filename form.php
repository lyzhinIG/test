<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['text'])) {$text = $_POST['text'];}
if (isset($_POST['a'])) {$a = $_POST['a'];}
if (isset($_POST['b'])) {$b = $_POST['b'];}
if (isset($_POST['sum'])) {$sum = $_POST['sum'];}

if (empty($name))
{
    echo "<b>Не указано имя!<p>";
    echo "<a href=feedback.html>Вернуться к заполнению формы</a>";
}
else
    if (empty($text))
    {
        echo "<b>Сообщение не написано!<p>";
        echo "<a href=feedback.html>Вернуться к заполнению формы</a>";
    }
    else
    {
        $s = $a + $b;
        if (empty($s))
        {
            echo "<b>Не введены числа или сумма равна нулю!<p>";
            echo "<a href=feedback.html>Вернуться к заполнению формы</a>";
        }
        else
            if ($s != $sum)
            {
                echo "<b>Введите правильно сумму!<p>";
                echo "<a href=feedback.html>Вернуться к заполнению формы</a>";
            }
        else
        {
            $to = "nerehtaru@yandex.ru"; 
            $headers = "Content-type: text/plain; charset = UTF-8";
            $subject = "Сообщение с вашего сайта";
            $message = "Имя пославшего: $name \nЭлектронный адрес: $email \nСообщение: $text";
            $send = mail ($to, $subject, $message, $headers);
            if ($send == 'true')
            {
                echo "<b>Спасибо за отправку вашего сообщения!<p>";
            }
            else
            {
                echo "<p><b>Сообщение не отправлено. Приносим свои извинения.";
                echo "<p><b>Попробуйте повторить отправку позже.";
            }
        }
}
?>