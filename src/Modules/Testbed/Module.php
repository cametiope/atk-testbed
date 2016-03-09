<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Core\Menu;

class Module extends \Sintattica\Atk\Core\Module
{
    static $module = 'testbed';

    function __construct()
    {
        $m = static::$module;

        $atk = Atk::getInstance();
        $atk->registerNode($m . '.playground', Playground::class, ['admin', 'add', 'edit', 'delete']);
        $atk->registerNode($m . '.o2o_node', O2ONode::class);
        $atk->registerNode($m . '.o2m_node', O2MNode::class);
        $atk->registerNode($m . '.m2o_node', M2ONode::class);
        $atk->registerNode($m . '.m2m_node', M2MNode::class);

        $menu = Menu::getInstance();
        $menu->addMenuItem('testbed', '', 'main', 1, 0, $m);
        $menu->addMenuItem('playground', Tools::dispatch_url($m . '.playground', 'admin'), 'testbed', [$m . '.playground', 'admin'], 0, $m);
        $menu->addMenuItem('m2oNode', Tools::dispatch_url($m . '.m2o_node', 'admin'), 'testbed', [$m . '.playground', 'admin'], 0, $m);
    }
}
