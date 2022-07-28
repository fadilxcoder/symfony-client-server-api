<?php

namespace App\EventSubscriber;

use App\Services\SecurityToken;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ClientVerifierSubscriber implements EventSubscriberInterface
{
    private $securityToken;

    public function __construct(SecurityToken $securityToken)
    {
        $this->securityToken = $securityToken;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!stripos($event->getRequest()->getRequestUri(), "api")) {
            return;
        }

        if (null === $event->getRequest()->headers->get('client-token')) {
            $event->setResponse(new JsonResponse([
                'error' => Response::HTTP_FORBIDDEN,
                'error_description' => 'client-token missing !'
            ], Response::HTTP_FORBIDDEN));

            return;
        }

        if ($event->getRequest()->headers->get('client-token') !== $this->securityToken->getToken()) {
            $event->setResponse(new JsonResponse([
                'error' => Response::HTTP_UNAUTHORIZED,
                'error_description' => 'Invalid client-token !'
            ], Response::HTTP_UNAUTHORIZED));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }
}