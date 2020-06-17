<?php

namespace App\Queue;

use App\Contract\NotificationSenderInterface;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class NotificationWorker
 *
 * @category Template_Class
 * @package  App\Queue
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class NotificationWorker implements ConsumerInterface
{
    /** @var NotificationSenderInterface $notificationSender */
    private $notificationSender;


    /**
     * NotificationWorker constructor.
     *
     * @param NotificationSenderInterface $notificationSender
     */
    public function __construct(NotificationSenderInterface $notificationSender)
    {
        $this->notificationSender = $notificationSender;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(AMQPMessage $msg)
    {
        try {
            $message = json_decode($msg->body, true);

            foreach ($message['users'] as $user) {
                $this->notificationSender->send(
                    $user,
                    $message['notification']
                );
                echo "- {$user['name']} has been notified." . PHP_EOL;
            }
        } catch (\Throwable $exception) {
            echo "Exception: " . $exception->getMessage() . PHP_EOL;
        }

        return true;
    }
}
