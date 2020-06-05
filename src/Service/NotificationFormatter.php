<?php

namespace App\Service;

use App\Constant\ChannelTypeConstant;
use App\Contract\NotificationFormatterInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\Translator;

/**
 * Class NotificationFormatter
 *
 * @package App\Service
 */
class NotificationFormatter implements NotificationFormatterInterface
{
    /** @var TwigEngine $twig */
    private $twig;

    /** @var Translator $translator */
    private $translator;

    /**
     * NotificationFormatter constructor.
     *
     * @param $twig
     * @param Translator $translator
     */
    public function __construct($twig, Translator $translator)
    {
        $this->twig = $twig;
        $this->translator = $translator;
    }

    /**
     * @param array  $user
     * @param array  $notification
     *
     * @return false|string
     * @throws \Twig\Error\Error
     */
    public function render(array $user, array $notification): string
    {
        $this->setLocale($user['locale']);

        //todo:: refactor the below IFs
        if ($user['channel'] == ChannelTypeConstant::EMAIL) {
            return $this->byEmail($user, $notification);
        }

        if ($user['channel'] == ChannelTypeConstant::SMS) {
            return $this->bySMS($user, $notification);
        }
    }

    /**
     * @param array $user
     * @param array $notification
     *
     * @return false|string
     * @throws \Twig\Error\Error
     */
    protected function byEmail(array $user, array $notification)
    {
        $data = array_merge($notification, $user);

        return $this->twig->render(
            '@MainBundle/Email/'.$data['template'].'.php.twig',
            $data
        );
    }

    /**
     * @param array $user
     * @param array $notification
     *
     * @return string
     */
    protected function bySMS(array $user, array $notification)
    {
        $data = array_merge($notification, $user);

        return $this->translator->trans("notifications.events.{$data['template']}", $data);
    }

    /**
     * @param string $locale
     *
     * @return $this
     */
    private function setLocale(string $locale): self
    {
        $this->translator->setLocale($locale);

        return $this;
    }
}
