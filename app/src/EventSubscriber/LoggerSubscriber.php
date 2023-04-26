<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\TerminateEvent;

class LoggerSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelTerminate(TerminateEvent $event)
    {
        $time = new \DateTime();

        /*
        $this->logger->info('***********************************************************************************');
        $this->logger->info('LOG REFERENCE ID :'.$event->getResponse()->headers->get('X-Log-Ref-Id'));
        $this->logger->info('***********************************************************************************');
        $this->logger->info('Date-time :'.$time->format('\A\t H:i:s \O\n Y-m-d'));
        $this->logger->info('Endpoint :'.$event->getRequest()->getMethod().' '.$event->getRequest()->getRequestUri());
        $this->logger->info('Request headers input :'.json_encode($event->getRequest()->headers->all()));
        $this->logger->info('Request parameters input :'.json_encode($event->getRequest()->request->all()));
        $this->logger->info('Request JSON input :'.$event->getRequest()->getContent());
        $this->logger->info('Response status code :'.$event->getResponse()->getStatusCode());
        $this->logger->info('Response output :'.$event->getResponse()->getContent());
        */

        /*
        $this->logger->info(
            $event->getResponse()->headers->get('X-Log-Ref-Id')."\n"
            .'Date-time :'.$time->format('\A\t H:i:s \O\n Y-m-d')."\n"
            .'Endpoint :'.$event->getRequest()->getMethod().' '.$event->getRequest()->getRequestUri()."\n"
            .'Request headers input :'.json_encode($event->getRequest()->headers->all())."\n"
            .'Request parameters input :'.json_encode($event->getRequest()->request->all())."\n"
            .'Request JSON input :'.$event->getRequest()->getContent()."\n"
            .'Response status code :'.$event->getResponse()->getStatusCode()."\n"
            .'Response output :'.$event->getResponse()->getContent()
        );
        */
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.terminate' => 'onKernelTerminate',
        ];
    }
}
