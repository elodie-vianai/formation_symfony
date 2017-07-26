<?php

namespace EV\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EVUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
