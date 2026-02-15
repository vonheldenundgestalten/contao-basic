<?php 

namespace VHUG\ContaoBasic\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AddBackendAssetsListener
{
    public function __construct(private readonly ScopeMatcher $scopeMatcher)
    {
    }

    public function __invoke(RequestEvent $event): void
    {
        // only add when scope = backend
        if (!$this->scopeMatcher->isBackendMainRequest($event)) {
            return;
        }

        $GLOBALS['TL_CSS'][] = 'bundles/contaobasic/css/backend.css';
        // $GLOBALS['TL_JAVASCRIPT'][] = /* add your JS asset here */;
    }
}
