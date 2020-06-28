<?php

namespace App\Service;

use App\Contract\ChannelFactoryInterface;
use App\Contract\NotificationFormatterInterface;
use App\Contract\NotificationSenderInterface;
use App\Exceptions\DriverNotFoundException;

/**
 * Class NotificationSender
 */
class NotificationSender implements NotificationSenderInterface
{
    /** @var ChannelFactoryInterface $channelFactory */
    private $channelFactory;

    /** @var NotificationFormatterInterface $notificationFormatter */
    private $notificationFormatter;

    /**
     * NotificationSender constructor.
     *
     * @param ChannelFactoryInterface        $channelFactory
     * @param NotificationFormatterInterface $notificationFormatter
     */
    public function __construct(
        ChannelFactoryInterface $channelFactory,
        NotificationFormatterInterface $notificationFormatter
    ) {
        $this->channelFactory = $channelFactory;
        $this->notificationFormatter = $notificationFormatter;
    }

    /**
     * @param array $user
     * @param array $notification
     *
     * @return mixed|void
     * @throws DriverNotFoundException
     * @throws \Twig\Error\Error
     */
    public function send(array $user, array $notification)
    {
        $driver = $this->channelFactory->create($user['channel']);
        $driver->send(
            $user,
            $this->notificationFormatter->render($user, $notification)
        );
    }
}
