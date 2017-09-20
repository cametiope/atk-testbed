<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\NumberAttribute;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Relations\ManyToOneRelation;

class M2MNode extends Node
{
    public function __construct($nodeUri, $flags = 0)
    {
        $this->setTable('testbed_M2MNode');
        $this->setSecurityAlias($this->getModule().'.playground');
        parent::__construct($nodeUri, $flags);
    }

    public function init()
    {
        $this->add(new ManyToOneRelation('playground_id', Attribute::AF_PRIMARY, 'testbed.playground'));
        $this->add(new ManyToOneRelation('remotetable_id', Attribute::AF_PRIMARY, 'testbed.m2o_node'));
        $this->add(new NumberAttribute('position'));
    }
}
