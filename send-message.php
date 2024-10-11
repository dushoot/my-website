<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Проверка на пустые поля
    if (empty($name) || empty($email) || empty($message)) {
        echo "Все поля обязательны для заполнения.";
        exit;
    }

    // Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email.";
        exit;
    }

    // Формирование сообщения
    $to = "andrei.i.korolev@gmail.com"; // Замените на ваш email
    $subject = "Новое сообщение с сайта";
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
    $headers = "From: $email";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Сообщение отправлено!'); window.location.href='index.html#contact';</script>";
    } else {
        echo "<script>alert('Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.'); window.location.href='index.html#contact';</script>";
    }
}
?>