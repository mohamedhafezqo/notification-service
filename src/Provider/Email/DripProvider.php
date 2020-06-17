<?php

namespace App\Provider\Email;

use App\Contract\ProviderInterface;

/**
 * Class DripProvider
 *
 * @package App\Provider\Email
 */
class DripProvider implements ProviderInterface
{
    /**
     * @var array $config
     **/
    private $config;

    /**
     * @var array $client
     */
    private $client;

    /**
     * DripProvider constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        //set Drip client configuration
    }

    /**
     * @param array  $notifiable
     * @param string $notification
     *
     * @return bool
     */
    public function send(array $notifiable, string $notification)
    {
        // send the notification to the user
        // $this->dripClient->send();
        // log if there is any issue
        return true;
    }
}
