<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Core\Node;

class O2ONode extends Node {
    public function __construct($nodeUri, $flags = 0)
    {
        parent::__construct($nodeUri, $flags);

        $this->setTable('testbed_O2ONode');
        $this->setSecurityAlias($this->getModule().'.playground');

        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('playground_id'));
        $this->add(new Attribute('o2o_name'));


    }
}