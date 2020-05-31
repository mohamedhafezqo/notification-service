<?php

namespace App\Contract;

/**
 * Interface ProviderInterface
 * @package App\Contract
 */
interface ProviderInterface
{
    /**
     * @param array $notifiable
     * @param string $notification
     *
     * @return mixed
     */
    public function send(array $notifiable, string $notification);
}
