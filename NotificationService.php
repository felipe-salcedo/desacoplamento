<?php

interface NotificationService
{
    public function sendNotification($message);
}

class EmailNotificationService implements NotificationService
{
    public function sendNotification($message)
    {
        echo "Enviando e-mail com a mensagem: " . $message . "<br>";
    }
}

class SMSNotificationService implements NotificationService
{
    public function sendNotification($message)
    {
        echo "Enviando SMS com a mensagem: " . $message . "<br>";
    }
}

class PushNotificationService implements NotificationService
{
    public function sendNotification($message)
    {
        echo "Enviando Push Notification com a mensagem: " . $message . "<br>";
    }
}
