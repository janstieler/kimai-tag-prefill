<?php

namespace App\EventSubscriber;

use App\Event\ThemeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomJavascriptSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ThemeEvent::JAVASCRIPT => ['addJavascript', 100],
        ];
    }

    public function addJavascript(ThemeEvent $event): void
    {
        $script = '<script src="/custom/prefill-tags.js"></script>';
        $event->addContent($script);
    }
}
