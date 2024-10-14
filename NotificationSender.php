<?php

class NotificationSender
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function send($message)
    {
        $this->notificationService->sendNotification($message);
    }
}
