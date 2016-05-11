<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Core\Node;

class M2ONode extends Node {
    public function __construct($nodeUri, $flags = 0)
    {
        parent::__construct($nodeUri, $flags);

        $this->setTable('testbed_M2ONode');
        $this->setSecurityAlias($this->getModule().'.playground');

        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('m2o_name', Attribute::AF_FORCE_LOAD));

        //$this->setDescriptorTemplate('[m2o_name]');
        $this->setDescriptorHandler($this);
    }

    public function descriptor($record)
    {

        return $record['m2o_name'];
    }
}
