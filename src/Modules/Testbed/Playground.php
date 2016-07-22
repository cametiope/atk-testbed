<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Core\Config;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Utils\EditFormModifier;

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
use Sintattica\Atk\Attributes\DateAttribute;
use Sintattica\Atk\Attributes\DateTimeAttribute;
use Sintattica\Atk\Attributes\DummyAttribute;
use Sintattica\Atk\Attributes\DurationAttribute;
use Sintattica\Atk\Attributes\EmailAttribute;
use Sintattica\Atk\Attributes\ExpressionAttribute;
use Sintattica\Atk\Attributes\FieldSet;
use Sintattica\Atk\Attributes\FileAttribute;
use Sintattica\Atk\Attributes\FileWriterAttribute;
use Sintattica\Atk\Attributes\FlagAttribute;
use Sintattica\Atk\Attributes\FormatAttribute;
use Sintattica\Atk\Attributes\FuzzySearchAttribute;
use Sintattica\Atk\Attributes\HiddenAttribute;
use Sintattica\Atk\Attributes\HtmlAttribute;
use Sintattica\Atk\Attributes\IpAttribute;
use Sintattica\Atk\Attributes\ListAttribute;
use Sintattica\Atk\Attributes\LiveTextPreviewAttribute;
use Sintattica\Atk\Attributes\MultipleFileAttribute;
use Sintattica\Atk\Attributes\MultiSelectAttribute;
use Sintattica\Atk\Attributes\NumberAttribute;
use Sintattica\Atk\Attributes\ParserAttribute;
use Sintattica\Atk\Attributes\PasswordAttribute;
use Sintattica\Atk\Attributes\RadioAttribute;
use Sintattica\Atk\Attributes\RadioDetailsAttribute;
use Sintattica\Atk\Attributes\RowCounterAttribute;
use Sintattica\Atk\Attributes\StateAttribute;
use Sintattica\Atk\Attributes\SwitchAttribute;
use Sintattica\Atk\Attributes\TabbedPane;
use Sintattica\Atk\Attributes\TagAttribute;
use Sintattica\Atk\Attributes\TextAttribute;
use Sintattica\Atk\Attributes\TimeAttribute;
use Sintattica\Atk\Attributes\TimeZoneAttribute;
use Sintattica\Atk\Attributes\UpdatedByAttribute;
use Sintattica\Atk\Attributes\UpdateStampAttribute;
use Sintattica\Atk\Attributes\UrlAttribute;
use Sintattica\Atk\Attributes\WeekdayAttribute;
use Sintattica\Atk\Relations\ManyToOneRelation;
use Sintattica\Atk\Relations\OneToManyRelation;
use Sintattica\Atk\Relations\OneToOneRelation;
use Sintattica\Atk\Relations\ShuttleRelation;

class Playground extends Node
{
    function theListAttributeDependency(EditFormModifier $modifier)
    {
        $record = &$modifier->getRecord();
        $record['theListAttribute2'] = 5;
        $modifier->refreshAttribute('theListAttribute2');
        //print_r($modifier->getNode());//->getAttribute('theListAttribute2'));
        /*$modifier->hideAttribute('theListAttribute2');

         $record = &$modifier->getRecord();

         if($record['theListAttribute'] == 2 &&  !$modifier->isInitial()){
             $modifier->showAttribute('theListAttribute2');
             $modifier->refreshAttribute('theListAttribute2');
         }*/
    }

    function __construct($nodeUri)
    {
        parent::__construct($nodeUri, Node::NF_ADD_LINK);

        $this->setTable('testbed_Playground');
        $this->add(new Attribute('id', A::AF_AUTOKEY));

        /** tab ************************/
        $tab = 'default';


        //test tabbed pane

        $this->add(new Attribute('Attribute'), $tab);
        $this->add(new BoolAttribute('BoolAttribute'), $tab);
        $this->add(new CalculatorAttribute('CalculatorAttribute', 0, '10*5'), $tab);

        $this->add(new TabbedPane('tabbedpane', 0, ['tab1' => ['Attribute'], 'tab2' => ['BoolAttribute', 'CalculatorAttribute']]));

        $attr = new ListAttribute('theListAttribute2', A::AF_OBLIGATORY | A::AF_SEARCHABLE,
            ['testo lungo della option_4', 'option_5', 'testo lungo della option_6'], [4, 5, 6]);
        $this->add($attr, 'tab2');



        return true;




// ListAttribute::AF_LIST_OBLIGATORY_NULL_ITEM |
        $attr = new ListAttribute('theListAttribute2', A::AF_OBLIGATORY | A::AF_SEARCHABLE,
            ['testo lungo della option_4', 'option_5', 'testo lungo della option_6'], [4, 5, 6]);
        $this->add($attr, $tab);

        //$this->add(new PasswordAttribute('PasswordAttribute', PasswordAttribute::AF_PASSWORD_NO_VALIDATE, true, ['minnumbers' => 2, 'minalphabeticchars' => 6]), $tab);

        return true;




        $attr = new ManyToOneRelation('FM2O', A::AF_SEARCHABLE, $this->getModule().'.m2o_node');
        // $attr->addDestinationFilter('id = 1');
        // $attr->setAutoSearch(true);
        // $attr->addOnChangeHandler('console.log("onchange triggered!");');
        $attr->addDependency([$this, 'theListAttributeDependency']);
        $this->add($attr, $tab);


        $this->add(new OneToManyRelation('the1OneToManyRelation', A::AF_SEARCHABLE, $this->getModule().'.o2m_node', 'playground_id'), $tab);
        $this->add(new OneToManyRelation('the2OneToManyRelation', A::AF_SEARCHABLE, $this->getModule().'.o2m_node2', 'playground_id'), $tab);


        for ($i = 0; $i < 10; $i++) {

            $this->add(new ExpressionAttribute('ExpressionAttribute'.$i, A::AF_SEARCHABLE, 'SELECT 5', 'number'), $tab);
        }

        return;

        //$tab = 'tab_2';

        $attr = new ListAttribute('theListAttribute', ListAttribute::AF_LIST_OBLIGATORY_NULL_ITEM | A::AF_OBLIGATORY | A::AF_SEARCHABLE,
            ['option_1', 'option_2', 'option_3'], [1, 2, 3]);
        $attr->addDependency([$this, 'theListAttributeDependency']);
        $this->add($attr, $tab);


        $attr = new DateAttribute('theDateAttribute', A::AF_SEARCHABLE);
        $attr->addOnChangeHandler('console.log("theDateTimeAttribute onchange triggered!");');
        $this->add($attr, $tab);

        return;


        $attr = new DateTimeAttribute('theDateTimeAttribute', A::AF_SEARCHABLE);


        //$attr->setEmptyValue(-1);
        $attr->setAutoSearch(true);

        $attr->addOnChangeHandler("console.log(el);");

        $this->add($attr, $tab);


        $this->add(new MultiSelectAttribute('MultiSelectAttribute', A::AF_SEARCHABLE, ['option1', 'option2', 'option3'],
            ['option1val', 'option2val', 'option3val']), $tab);


        $this->add(new Attribute('Attribute'), $tab);
        $this->add(new BoolAttribute('BoolAttribute'), $tab);
        $this->add(new CalculatorAttribute('CalculatorAttribute', 0, '10*5'), $tab);
        $this->add(new CkAttribute('CkAttribute'), $tab);
        $this->add(new ColorPickerAttribute('ColorPickerAttribute'), $tab);
        $this->add(new CountryAttribute('CountryAttribute'), $tab);
        $this->add(new CreatedByAttribute('CreatedByAttribute'), $tab);
        $this->add(new CreateStampAttribute('CreateStampAttribute'), $tab);


        /** tab ************************/
        $tab = "tab_2";


        $this->add(new CurrencyAttribute('CurrencyAttribute'), $tab);

        $this->add(new DummyAttribute('DummyAttribute'), $tab);
        $this->add(new DurationAttribute('DurationAttribute'), $tab);
        $this->add(new EmailAttribute('EmailAttribute'), $tab);
        //$this->add(new ExpressionAttribute('ExpressionAttribute', 0, 'SELECT "test expression"'), $tab);
        $this->add(new IpAttribute('IpAttribute'), $tab);


        /** tab ************************/
        $tab = "tab_3";

        $this->add(new DummyAttribute('FieldSet_dummy1', A::AF_NO_LABEL, 'FieldSet_dummy1_content'), $tab);
        $this->add(new DummyAttribute('FieldSet_dummy2', A::AF_NO_LABEL, 'FieldSet_dummy2_content'), $tab);
        $this->add(new FieldSet('FieldSet', 0, '[FieldSet_dummy1] e [FieldSet_dummy2]'), $tab);
        $this->add(new FileAttribute('FileAttribute', 0, [Config::getGlobal('application_dir').'web/files/', '/files/']), $tab);
        $this->add(new FileWriterAttribute('FileWriterAttribute', 0, Config::getGlobal('application_dir').'web/files/filewriterfile.txt'), $tab);
        $this->add(new FlagAttribute('FlagAttribute', 0, ['option_with_1', 'option_with_2', 'option_with_4'], [1, 2, 4]), $tab);
        $this->add(new FormatAttribute('FormatAttribute', 0, 'AAA/##/##'), $tab);

        //TODO: FuzzySearchAttribute: test
        // $this->add(new FuzzySearchAttribute('FuzzySearchAttribute'), $tab);

        $this->add(new HiddenAttribute('HiddenAttribute'), $tab);
        $this->add(new HtmlAttribute('HtmlAttribute'), $tab);


        /** tab ************************/
        $tab = "tab_4";

        $this->add(new Attribute('LiveTextPreviewAttributeMaster'), $tab);
        $this->add(new LiveTextPreviewAttribute('LiveTextPreviewAttribute', 0, 'LiveTextPreviewAttributeMaster'), $tab);
        $this->add(new MultipleFileAttribute('MultipleFileAttribute', 0, [Config::getGlobal('application_dir').'web/multiplefiles/', '/multiplefiles/']), $tab);

        $this->add(new NumberAttribute('NumberAttribute', 0, 20, 2), $tab);
        $this->add(new ParserAttribute('ParserAttribute', 0, 'NumberAttribute is: [NumberAttribute]'), $tab);
        $this->add(new PasswordAttribute('PasswordAttribute'), $tab);
        $this->add(new RadioAttribute('RadioAttribute', 0, ['option_1', 'option_2', 'option_3']), $tab);

        /** tab ************************/
        $tab = "tab_5";

        $this->add(new RowCounterAttribute('RowCounterAttribute'), $tab);
        $this->add(new StateAttribute('StateAttribute'), $tab);
        $this->add(new SwitchAttribute('SwitchAttribute'), $tab);

        //TODO: TabbedPane: test
        //$this->add(new TabbedPane('TabbedPane'), $tab);

        //TODO: TagAttribute: test
        //$this->add(new TagAttribute('TagAttribute'), $tab);

        $this->add(new TextAttribute('TextAttribute'), $tab);
        $this->add(new TimeAttribute('TimeAttribute'), $tab);
        $this->add(new TimeZoneAttribute('TimeZoneAttribute'), $tab);
        $this->add(new UpdatedByAttribute('UpdatedByAttribute'), $tab);
        $this->add(new UpdateStampAttribute('UpdateStampAttribute'), $tab);
        $this->add(new UrlAttribute('UrlAttribute'), $tab);
        $this->add(new WeekdayAttribute('WeekdayAttribute'), $tab);


        /** RELATIONS **/

        /** tab ************************/
        $tab = "tab_6";

        $this->add(new OneToOneRelation('OneToOneRelation', 0, $this->getModule().'.o2o_node', 'playground_id'), $tab);


        $rel = new ShuttleRelation('ShuttleRelation', 0, $this->getModule().'.m2m_node', $this->getModule().'.m2o_node');
        $rel->setLocalKey('playground_id');
        $rel->setRemoteKey('remotetable_id');
        $this->add($rel, $tab);
    }


}
