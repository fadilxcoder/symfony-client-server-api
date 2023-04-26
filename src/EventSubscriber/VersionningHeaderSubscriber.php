<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class VersionningHeaderSubscriber implements EventSubscriberInterface
{
    private $apiMinorVersion;

    public function __construct(string $apiMinorVersion)
    {
        $this->apiMinorVersion = $apiMinorVersion;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $event->getResponse()->headers->add([
            'X-Api-Version' => $this->apiMinorVersion,
        ]);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.response' => 'onKernelResponse',
        ];
    }
}
