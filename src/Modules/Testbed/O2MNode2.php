<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\ListAttribute;

class O2MNode2 extends Node {
    public function __construct($nodeUri, $flags = 0)
    {
        parent::__construct($nodeUri, $flags);

        $this->setTable('testbed_O2MNode2');
        $this->setSecurityAlias($this->getModule().'.playground');
        $this->setDescriptorTemplate('[o2mName]');


        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('playground_id'));
        $this->add(new ListAttribute('o2mName', Attribute::AF_SEARCHABLE, ['test1', 'test']));


    }
}