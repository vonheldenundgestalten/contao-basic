<?php 

namespace VHUG\ContaoBasic\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AddBackendAssetsListener
{
    public function __construct(private readonly ScopeMatcher $scopeMatcher)
    {
    }

    public function __invoke(RequestEvent $event): void
    {
        if (!$this->scopeMatcher->isBackendMainRequest($event)) {
            return;
        }

        $GLOBALS['TL_CSS'][] = 'bundles/contaobasic/css/backend.css';

        if (!$this->shouldAddDevMarker($event)) {
            return;
        }

        $GLOBALS['TL_CSS'][] = 'bundles/contaobasic/css/dev-backend-marker.css|static';
    }

    private function shouldAddDevMarker(RequestEvent $event): bool
    {
        $override = $this->getEnvValue('VHUG_DEV_BACKEND_MARKER');

        if ($override === 'off') {
            return false;
        }

        if ($override === 'on') {
            return true;
        }

        $host = strtolower($event->getRequest()->getHost());

        return $host === 'abnahme-server.de' || substr($host, -strlen('.abnahme-server.de')) === '.abnahme-server.de';
    }

    private function getEnvValue(string $name): ?string
    {
        $value = $_SERVER[$name] ?? $_ENV[$name] ?? getenv($name);

        if (!is_string($value) || $value === '') {
            return null;
        }

        return strtolower(trim($value));
    }
}
