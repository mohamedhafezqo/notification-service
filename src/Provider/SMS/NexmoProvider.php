<?php

namespace App\Provider\SMS;

use App\Contract\ProviderInterface;

/**
 * Class NexmoProvider
 *
 * @package App\Provider\SMS
 */
class NexmoProvider implements ProviderInterface
{
    /** @var array $config **/
    private $config;

    /** @var array $client **/
    private $client;

    /**
     * NexmoProvider constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        //set Nexmo client configuration
    }

    /**
     * @param array  $notifiable
     * @param string $notification
     *
     * @return mixed|string
     */
    public function send(array $notifiable, string $notification)
    {
        // $this->nexmoClient->send([
        //     'phone' => $notifiable['to'],
        //     'message' => $notification,
        //     'sender' => 'Swvl',
        // ]);
        // log if there is any issue
        return true;
    }
}
