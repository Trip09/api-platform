<?php
// api/src/EventSubscriber/BookMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Tests\Encoder\PasswordEncoder;

final class UserPasswordSubscriber implements EventSubscriberInterface
{
    /**
     * UserPasswordSubscriber constructor.
     *
     * @param PasswordEncoder $passwordEncoder
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE],
        ];
    }

    public function encodePassword(GetResponseForControllerResultEvent $event)
    {
        $user   = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof User || (Request::METHOD_POST !== $method && Request::METHOD_PUT !== $method)) {
            return;
        }

        $user->setPassword($this->userPasswordEncoder->encodePassword($user, $user->plainPassword));
        $user->eraseCredentials();
    }
}