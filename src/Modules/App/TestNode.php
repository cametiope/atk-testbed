<?php

namespace App\Modules\App;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Config;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\TextAttribute;

class TestNode extends Node
{
    function __construct($nodeUri)
    {

        parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD | Node::NF_IMPORT);
        $this->setTable('TestNode');

        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('name', Attribute::AF_OBLIGATORY));
        $this->add(new TextAttribute('description'));

        $this->setDescriptorTemplate('[name]');
    }
}
