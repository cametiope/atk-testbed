<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\NumberAttribute;
use Sintattica\Atk\Core\Node;

class M2ONode extends Node
{
    public function __construct($nodeUri, $flags = 0)
    {
        $this->setSecurityAlias($this->getModule().'.playground');

        parent::__construct($nodeUri, $flags | Node::NF_ADD_LINK);

      //  $this->addFilter('id < 30');
        $this->setTable('testbed_M2ONode');

        $this->setDescriptorTemplate('[id] [m2o_name]');
        //  $this->setDescriptorHandler($this);
    }

    public function init()
    {
        $this->add(new NumberAttribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('m2o_name', Attribute::AF_FORCE_LOAD | Attribute::AF_SEARCHABLE));
        $this->add(new NumberAttribute('numeroA', Attribute::AF_SEARCHABLE, 2));
        $this->add(new NumberAttribute('numeroB', Attribute::AF_SEARCHABLE, 2));
    }


    public function ___m2o_name_display($record, $mode) {
        return $record['m2o_name']. '' .$record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'] .''. $record['m2o_name'];
    }


    /*
    public function descriptor($record)
    {

        return $record['m2o_name'];
    }
    */
}
