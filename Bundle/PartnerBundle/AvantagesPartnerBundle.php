<?php

namespace Avantages\Bundle\PartnerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AvantagesPartnerBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
