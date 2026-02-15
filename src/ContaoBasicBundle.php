<?php

namespace VHUG\ContaoBasic;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoBasicBundle extends Bundle
{
	public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
