<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Core\Node;

class M2MNode extends Node
{
    public function __construct($nodeUri, $flags = 0)
    {
        parent::__construct($nodeUri, $flags);

        $this->setTable('testbed_M2MNode');
        $this->setSecurityAlias($this->getModule().'.playground');
    }

    public function init()
    {
        $this->add(new Attribute('playground_id', Attribute::AF_PRIMARY));
        $this->add(new Attribute('remotetable_id', Attribute::AF_PRIMARY));
    }
}
