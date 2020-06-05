<?php

namespace App\Contract;

interface QueueProducerInterface
{
    /**
     * @param string $message
     *
     * @return mixed
     */
    public function publish(string $message);
}
