<?php

namespace App\Modules\App;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\CreatedByAttribute;
use Sintattica\Atk\Attributes\TextAttribute;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\RecordList\HtmlRecordList;

class TestNode extends Node
{
    public function __construct($nodeUri)
    {
        parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD | Node::NF_IMPORT);
        $this->setTable('TestNode');
        $this->setDescriptorTemplate('[name]');

        //    $user = SecurityManager::atkGetUser();
        //   print_r($user);die;

    }

    public function init()
    {
        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
        $this->add(new Attribute('name', Attribute::AF_OBLIGATORY | Attribute::AF_SEARCHABLE));
        $this->add(new TextAttribute('description'));
        $this->add(new CreatedByAttribute('creator'));
    }

    public function action_lista_admin()
    {
        $recordset = $this->select()->getAllRows();
        $recordList = new HtmlRecordList();
        $recordList->setExportingCSVToFile(false);

        echo $recordList->render($this, $recordset);
        die;
    }
}
