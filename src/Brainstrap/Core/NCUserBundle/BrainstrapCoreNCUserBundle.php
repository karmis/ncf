<?php

namespace Brainstrap\Core\NCUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BrainstrapCoreNCUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
