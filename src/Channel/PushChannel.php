<?php

namespace App\Channel;

use App\Contract\ChannelInterface;
use App\Contract\ProviderInterface;

/**
 * Class PushChannel
 *
 * @package App\Channel
 */
class PushChannel implements ChannelInterface
{
    /** @var ProviderInterface $provider */
    private $provider;

    /**
     * SmsChannel constructor.
     *
     * @param \App\Contract\ProviderInterface $provider
     */
    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param array  $notifiable
     * @param string $notification
     *
     * @return mixed
     */
    public function send(array $notifiable, string $notification)
    {
        return $this->provider->send($notifiable, $notification);
    }
}
