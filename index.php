<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notificações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            resize: none;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ffe9;
            border-left: 5px solid #4CAF50;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>Sistema de Notificações</h1>

    <form action="index.php" method="POST">
        <label for="message">Mensagem:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <label for="notification_type">Selecione o tipo de notificação:</label><br>
        <select id="notification_type" name="notification_type">
            <option value="email">E-mail</option>
            <option value="sms">SMS</option>
            <option value="push">Push Notification</option>
        </select><br><br>

        <input type="submit" value="Enviar Notificação">
    </form>

    <?php
    require_once 'NotificationService.php';
    require_once 'NotificationSender.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['message'];
        $notificationType = $_POST['notification_type'];

        switch ($notificationType) {
            case 'email':
                $service = new EmailNotificationService();
                break;
            case 'sms':
                $service = new SMSNotificationService();
                break;
            case 'push':
                $service = new PushNotificationService();
                break;
            default:
                echo "Tipo de notificação inválido!";
                exit;
        }

        $notificationSender = new NotificationSender($service);
        $notificationSender->send($message);
    }
    ?>
</body>

</html>