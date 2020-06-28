<?php

namespace App\Service;

use App\Contract\ChannelFactoryInterface;
use App\Contract\ChannelInterface;
use App\Exceptions\DriverNotFoundException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ChannelFactory implements ChannelFactoryInterface
{
    /**
     * @var ContainerInterface $container
     */
    private $container;

    /**
     * ChannelFactory constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function create(string $channelName): ChannelInterface
    {
        $className = ucfirst($channelName) . 'Channel';
        $channel   = 'App\\Channel\\' . $className;

        if (!class_exists($channel)) {
            throw new DriverNotFoundException("We don't support " . $channelName . 'Driver');
        }

        return $this->container->get($channel);
    }
}
