<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\ListAttribute;
use Sintattica\Atk\Core\Node;

class O2MNode extends Node
{
    public function __construct($nodeUri, $flags = 0)
    {
        parent::__construct($nodeUri, $flags);

        $this->setTable('testbed_O2MNode');
        $this->setSecurityAlias($this->getModule().'.playground');
        $this->setDescriptorTemplate('[o2mName]');
        //$this->add(new Attribute('o2mName', Attribute::AF_SEARCHABLE));
    }

    public function init()
    {
        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('playground_id'));
        $this->add(new ListAttribute('o2mName', Attribute::AF_SEARCHABLE, ['test', 'test1', 'test2', 'test3']));
    }
}