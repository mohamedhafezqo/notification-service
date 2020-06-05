<?php

namespace App\Type;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\Translator;

/**
 * Class PromoCode
 *
 * @package App\Type
 */
class PromoCode
{
    /** @var ArrayCollection $notification */
    private $notification;

    /** @var ArrayCollection $user */
    private $user;

    /**
     * PromoCode constructor.
     *
     * @param array $notification
     * @param array $user
     */
    public function __construct(array $notification, array $user)
    {
        $this->notification = new ArrayCollection($notification);
        $this->user = new ArrayCollection($user);
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->user->get('locale');
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->user->get('name');
    }

    /**
     * @return mixed|null
     */
    public function getTemplate(): ?string
    {
        return $this->notification->get('template');
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->notification->get('code');
    }

    /**
     * @return string|null
     */
    public function getDiscount(): ?string
    {
        return $this->notification->get('discount');
    }
}
