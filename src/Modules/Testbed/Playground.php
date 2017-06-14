<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\BoolAttribute;
use Sintattica\Atk\Attributes\CalculatorAttribute;
use Sintattica\Atk\Attributes\CkAttribute;
use Sintattica\Atk\Attributes\ColorPickerAttribute;
use Sintattica\Atk\Attributes\CountryAttribute;
use Sintattica\Atk\Attributes\CreatedByAttribute;
use Sintattica\Atk\Attributes\CreateStampAttribute;
use Sintattica\Atk\Attributes\CurrencyAttribute;
use Sintattica\Atk\Attributes\DateTimeAttribute;
use Sintattica\Atk\Attributes\DummyAttribute;
use Sintattica\Atk\Attributes\DurationAttribute;
use Sintattica\Atk\Attributes\EmailAttribute;
use Sintattica\Atk\Attributes\ExpressionAttribute;
use Sintattica\Atk\Attributes\FieldSet;
use Sintattica\Atk\Attributes\FileAttribute;
use Sintattica\Atk\Attributes\FlagAttribute;
use Sintattica\Atk\Attributes\FormatAttribute;
use Sintattica\Atk\Attributes\HiddenAttribute;
use Sintattica\Atk\Attributes\HtmlAttribute;
use Sintattica\Atk\Attributes\IpAttribute;
use Sintattica\Atk\Attributes\ListAttribute;
use Sintattica\Atk\Attributes\NumberAttribute;
use Sintattica\Atk\Attributes\ParserAttribute;
use Sintattica\Atk\Attributes\PasswordAttribute;
use Sintattica\Atk\Attributes\RadioAttribute;
use Sintattica\Atk\Attributes\SwitchAttribute;
use Sintattica\Atk\Attributes\TextAttribute;
use Sintattica\Atk\Attributes\TimeAttribute;
use Sintattica\Atk\Attributes\TimeZoneAttribute;
use Sintattica\Atk\Attributes\UpdatedByAttribute;
use Sintattica\Atk\Attributes\UpdateStampAttribute;
use Sintattica\Atk\Attributes\UrlAttribute;
use Sintattica\Atk\Attributes\WeekdayAttribute;
use Sintattica\Atk\Core\Config;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Relations\ExtendableShuttleRelation;
use Sintattica\Atk\Relations\ManyToManySelectRelation;
use Sintattica\Atk\Relations\ManyToOneRelation;
use Sintattica\Atk\Relations\OneToManyRelation;
use Sintattica\Atk\Relations\OneToOneRelation;
use Sintattica\Atk\Relations\ShuttleRelation;
use Sintattica\Atk\Utils\EditFormModifier;

class Playground extends Node
{
    public function __construct($nodeUri)
    {
        parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_MULTI_RECORD_ACTIONS);
        $this->setTable('testbed_Playground');

        $tab = 'default';

        $attr = $this->add(new Attribute('id', A::AF_AUTOKEY), $tab);
        $attr->removeFlag(A::AF_HIDE)->addFlag(A::AF_READONLY);


        //$this->addDefaultFields($tab);
        //$this->utp($tab);
        //$this->testTabs();
        $this->testJquery();

        // $this->add(new SmartM2O('FM2O', A::AF_LARGE | A::AF_SEARCHABLE, $this->getModule().'.m2o_node'), $tab);

    }

    public function recordActions($record, &$actions, &$mraactions)
    {
        $mraactions[] = 'test1';
        $mraactions[] = 'test2';
        parent::recordActions($record, $actions, $mraactions); // TODO: Change the autogenerated stub
    }

    public function FM2ODependency(EditFormModifier $modifier)
    {
        if (!$modifier->isInitial()) {
            $record = &$modifier->getRecord();
            $record['Attribute'] = date('H:i:s');
            //$attr = $modifier->getNode()->getAttribute('Attribute');
            $modifier->refreshAttribute('Attribute');
        }
    }

    public function listAttributeChanged(EditFormModifier $modifier)
    {
        $record = &$modifier->getRecord();
        $record['UrlAttribute'] = date('H:i:s')."ciao l'è bel ";

        $modifier->refreshAttribute('UrlAttribute');
    }

    public function action_test1()
    {
        print_r($this->m_postvars['atkselector']);
        die;
    }

    protected function addDefaultFields($tab)
    {
        $this->add(new Attribute('Attribute'), $tab)->setHelp('attr_help_test')->setPlaceholder('testo di placeholder');
        $this->add(new BoolAttribute('BoolAttribute'), $tab);
        $this->add(new CalculatorAttribute('CalculatorAttribute', 0, '10*5'), $tab);
        $this->add(new DateTimeAttribute('theDateAttribute', A::AF_SEARCHABLE), $tab);
        $this->add(new ListAttribute('theListAttribute', A::AF_SEARCHABLE, ['testo lungo della option_4', 'option_5', 'testo lungo della option_6'], [4, 5, 6]),
            $tab);
        $this->add(new ManyToOneRelation('FM2O', A::AF_LARGE | A::AF_SEARCHABLE, $this->getModule().'.m2o_node'), $tab);
        $this->add(new PasswordAttribute('PasswordAttribute', PasswordAttribute::AF_PASSWORD_NO_VALIDATE, true, ['minnumbers' => 2, 'minalphabeticchars' => 6]),
            $tab);
        $this->add(new OneToManyRelation('the1OneToManyRelation', A::AF_SEARCHABLE, $this->getModule().'.o2m_node', 'playground_id'), $tab);
        $this->add(new OneToManyRelation('the2OneToManyRelation', A::AF_SEARCHABLE, $this->getModule().'.o2m_node2', 'playground_id'), $tab);
        $this->add(new ExpressionAttribute('ExpressionAttribute', A::AF_SEARCHABLE, 'SELECT 5', 'number'), $tab);
        $this->add(new CkAttribute('CkAttribute'), $tab);
        $this->add(new ColorPickerAttribute('ColorPickerAttribute'), $tab);
        $this->add(new CountryAttribute('CountryAttribute'), $tab);
        $this->add(new CreatedByAttribute('CreatedByAttribute'), $tab);
        $this->add(new CreateStampAttribute('CreateStampAttribute'), $tab);
        $this->add(new DummyAttribute('DummyAttribute'), $tab);
        $this->add(new DurationAttribute('DurationAttribute'), $tab);
        $this->add(new EmailAttribute('EmailAttribute'), $tab);
        $this->add(new IpAttribute('IpAttribute'), $tab);
        $this->add(new CurrencyAttribute('CurrencyAttribute'), $tab);
        $this->add(new DummyAttribute('FieldSet_dummy1', A::AF_NO_LABEL, 'FieldSet_dummy1_content'), $tab);
        $this->add(new DummyAttribute('FieldSet_dummy2', A::AF_NO_LABEL, 'FieldSet_dummy2_content'), $tab);
        $this->add(new FieldSet('FieldSet', 0, '[FieldSet_dummy1] e [FieldSet_dummy2]'), $tab);
        $this->add(new FileAttribute('FileAttribute', 0, [Config::getGlobal('application_dir').'web/files/', '/files/']), $tab);
        $this->add(new FlagAttribute('FlagAttribute', 0, ['option_with_1', 'option_with_2', 'option_with_4'], [1, 2, 4]), $tab);
        $this->add(new FormatAttribute('FormatAttribute', 0, 'AAA/##/##'), $tab);
        $this->add(new HiddenAttribute('HiddenAttribute'), $tab);
        $this->add(new HtmlAttribute('HtmlAttribute'), $tab);
        $this->add(new NumberAttribute('NumberAttribute', 0, 20, 2), $tab)->setPlaceholder('test placeholder NumberAttribute');
        $this->add(new ParserAttribute('ParserAttribute', 0, 'NumberAttribute is: [NumberAttribute]'), $tab);
        $this->add(new RadioAttribute('RadioAttribute', 0, ['option_1', 'option_2', 'option_3']), $tab);
        $this->add(new SwitchAttribute('SwitchAttribute'), $tab);
        $attr = $this->add(new TextAttribute('TextAttribute'), $tab);
        $attr->setCssStyle('edit', 'border', '2px dotted red');
        $this->add(new TimeAttribute('TimeAttribute'), $tab);
        $this->add(new TimeZoneAttribute('TimeZoneAttribute'), $tab);
        $this->add(new UpdatedByAttribute('UpdatedByAttribute'), $tab);
        $this->add(new UpdateStampAttribute('UpdateStampAttribute'), $tab);
        $this->add(new UrlAttribute('UrlAttribute'), $tab)->setPlaceholder('test placeholder UrlAttribute');
        $this->add(new WeekdayAttribute('WeekdayAttribute'), $tab);
        $this->add(new OneToOneRelation('OneToOneRelation', 0, $this->getModule().'.o2o_node', 'playground_id'), $tab);
        $this->add(new ShuttleRelation('ShuttleRelation', 0, $this->getModule().'.m2m_node', $this->getModule().'.m2o_node', 'playground_id', 'remotetable_id'),
            $tab);
    }

    protected function testDependee()
    {
        $this->add(new ManyToOneRelation('FM2O', A::AF_LARGE | A::AF_SEARCHABLE, $this->getModule().'.m2o_node'))->addDependency([$this, 'FM2ODependency']);
        $this->add(new Attribute('Attribute'));
    }

    protected function testJquery()
    {
        $tab = 'default';


        $this->getPage()->register_script(Config::getGlobal('assets_url').'javascript/attribute.js');

        $this->add(new Attribute('Attribute', A::AF_OBLIGATORY), $tab);
        $this->add(new Attribute('UrlAttribute'), $tab);

        $attr = new ManyToManySelectRelation('ShuttleRelation', 0, $this->getModule().'.m2m_node', $this->getModule().'.m2o_node', 'playground_id',
            'remotetable_id');
        $attr->setPositionAttribute('position');

        $this->add($attr, $tab);


//        $this->add(new Attribute('Attribute'), $tab);
//        $this->add(new Attribute('UrlAttribute'), $tab);
        $this->add(new ListAttribute('theListAttribute', 0, ['uno', 'due', 'tre', 'quattro']), $tab)->addDependency([$this, 'listAttributeChanged']);
        $this->add(new DateTimeAttribute('theDateTimeAttribute', A::AF_SEARCHABLE), $tab);
//        $this->add(new OneToManyRelation('the1OneToManyRelation', A::AF_SEARCHABLE, $this->getModule().'.o2m_node', 'playground_id'), $tab);

        /*
        $this->add(new TabbedPane('tbpane', 0, [
            'tb1' => ['theListAttribute', 'the1OneToManyRelation'],
            'tb2' => ['Attribute', 'UrlAttribute'],
        ]));
        */
    }

    protected function testTabs()
    {
        $tab = 'tab_uno';
        $this->add(new Attribute('Attribute'), $tab);
        $this->add(new Attribute('BoolAttribute'), $tab);
        $this->add(new Attribute('CountryAttribute'), $tab);

        $tab = 'tab_due';
        $this->add(new Attribute('NumberAttribute'), $tab);
        $this->add(new Attribute('DurationAttribute'), $tab);
        $this->add(new Attribute('CkAttribute'), $tab);

        $tab = 'tab_tre';
        $this->add(new Attribute('FlagAttribute'), $tab);
        $this->add(new Attribute('FileAttribute'), $tab);
        $this->add(new Attribute('TimeAttribute'), $tab);

    }

    protected function utp($tab)
    {

        $this->add(new Attribute('Attribute', A::AF_SEARCHABLE), $tab);
//        $this->add(new DurationAttribute('DurationAttribute'), $tab);
//        $this->add(new BoolAttribute('BoolAttribute'), $tab);
//
//        $this->add(new NumberAttribute('NumberAttribute'), $tab);
//        $this->add(new DateAttribute('theDateAttribute', A::AF_SEARCHABLE), $tab);
//        $this->add(new ListAttribute('theListAttribute', A::AF_SEARCHABLE, ['uno', 'due', 'tre']), $tab);
//
//        $attr = $this->add(new ManyToOneRelation('FM2O', A::AF_SEARCHABLE|A::AF_LARGE, $this->getModule().'.m2o_node'), $tab);
//        $attr->setMultipleSearch(true, true);
//
//
//        $attr = $this->add(new MultiSelectListAttribute("MultiSelectListAttribute", A::AF_SEARCHABLE, ['uno', 'due', 'tre', 'quattro']), $tab);
//        $attr->setMultipleSearch(true, true);

        // $this->add(new FieldSet('test', A::AF_OBLIGATORY, '[FM2O] [BoolAttribute] [theListAttribute] [theDateAttribute]'), $tab);


        // $this->add(new DurationAttribute('DurationAttribute'), $tab);

//        $flags = A::AF_OBLIGATORY|DateAttribute::AF_DATE_DEFAULT_EMPTY|DateAttribute::AF_DATE_EMPTYFIELD;
//        $flags = A::AF_OBLIGATORY|DateAttribute::AF_DATE_DEFAULT_EMPTY;
//        $this->add(new DateAttribute('theDateAttribute', A::AF_SEARCHABLE|$flags), $tab);


//
//        $this->add(new NumberAttribute('NumberAttribute', A::AF_SEARCHABLE), $tab);
//        $this->add(new Attribute('Attribute', A::AF_SEARCHABLE), $tab);
//
//        $this->add(new FieldSet('test', A::AF_OBLIGATORY, '[NumberAttribute][Attribute]'), $tab);

//        // $this->add(new DateTimeAttribute('theDateAttribute', A::AF_SEARCHABLE), $tab);
//
//
//      //  $attr->setCssStyle(['edit', 'search', 'extended_search'], 'width', '100px');
//      //  $attr->setCssStyle(['edit', 'search', 'extended_search'], 'color', 'red');
//
//
//
////
////
////        // $attr->setCssStyle(['edit', 'add'], 'width', '100px');
////        // $attr->setCssStyle(['search','extended_search'], 'width', '100px');
////
////        /** @var ListAttribute $attr */
//        $attr = $this->add(new ListAttribute('theListAttribute', A::AF_SEARCHABLE, ['uno', 'due', 'tre']), $tab);
//        $attr->setCssStyle('search', 'width', 'auto');
//        $attr->setCssStyle('extended_search', 'width', 'auto');
//        $attr->setCssStyle('extended_search', 'display', 'inline-block');
////
//          $attr->setMultipleSearch(true, true);
//
////        /** @var ManyToOneRelation $attr */
//        $attr = $this->add(new ManyToOneRelation('FM2O', A::AF_SEARCHABLE | A::AF_LARGE, $this->getModule().'.m2o_node'), $tab);
//      //  $attr->setCssStyle('search', 'width', '300px');
//         $attr->setMultipleSearch(true, true);
////
////
//        $attr = $this->add(new MultiSelectListAttribute("MultiSelectListAttribute", A::AF_SEARCHABLE, ['uno', 'due', 'tre', 'quattro']), $tab);
//        //$attr->setCssStyle('edit', 'width', '100%');
//       // $attr->setCssStyle('edit', 'display', 'inline-block');
//        $attr->setSelect2Options(['width' => 'auto'], 'edit');
//      //  $attr->setMultipleSearch(true, false);
//
//
//        $this->getPage()->register_stylecode(<<<EOF
//.select2-container--bootstrap {
//    display: inline-block;
//}
//EOF
//);

    }
}
