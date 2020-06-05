<?php

namespace App\Contract;

interface NotificationFormatterInterface
{
    /**
     * @param array  $user
     * @param array  $notification
     *
     * @return false|string
     * @throws \Twig\Error\Error
     */
    public function render(array $user, array $notification): string;
}
