<?php


namespace App\Contract;

/**
 * Interface ChannelInterface
 *
 * @package App\Contract
 */
interface ChannelInterface
{
    /**
     * @param array  $notifiable
     * @param string $notification
     *
     * @return mixed
     */
    public function send(array $notifiable, string $notification);
}
