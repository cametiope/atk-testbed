<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Core\Menu;

class Module extends \Sintattica\Atk\Core\Module
{
    static $module = 'testbed';

    public function boot()
    {
        $this->registerNode('playground', Playground::class, ['admin', 'add', 'edit', 'delete']);
        $this->registerNode('o2o_node', O2ONode::class);
        $this->registerNode('o2m_node', O2MNode::class);
        $this->registerNode('o2m_node2', O2MNode2::class);
        $this->registerNode('m2o_node', M2ONode::class);
        $this->registerNode('m2m_node', M2MNode::class);

        $this->addMenuItem('testbed');
        $this->addNodeToMenu('playground', 'playground', 'admin', 'testbed');
        $this->addNodeToMenu('m2o_node', 'm2o_node', 'admin', 'testbed');
    }
}
