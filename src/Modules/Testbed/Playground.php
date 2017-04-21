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
use Sintattica\Atk\Relations\ManyToOneRelation;
use Sintattica\Atk\Relations\OneToManyRelation;
use Sintattica\Atk\Relations\OneToOneRelation;
use Sintattica\Atk\Relations\ShuttleRelation;

class Playground extends Node
{
    public function __construct($nodeUri)
    {
        parent::__construct($nodeUri, Node::NF_ADD_LINK);
        $this->setTable('testbed_Playground');
    }

    public function init()
    {
        parent::init();

        $attr = $this->add(new Attribute('id', A::AF_AUTOKEY));
        $attr->removeFlag(A::AF_HIDE)->addFlag(A::AF_READONLY);

        $tab = 'default';
        $this->addDefaultFields($tab);
    }

    protected function addDefaultFields($tab)
    {
        $this->add(new Attribute('Attribute'), $tab)->setHelp('attr_help_test')->setPlaceholder('testo di placeholder');
        $this->add(new BoolAttribute('BoolAttribute'), $tab);
        $this->add(new CalculatorAttribute('CalculatorAttribute', 0, '10*5'), $tab);
        $this->add(new DateTimeAttribute('theDateAttribute', A::AF_SEARCHABLE), $tab);
        $this->add(new ListAttribute('theListAttribute', A::AF_SEARCHABLE, ['testo lungo della option_4', 'option_5', 'testo lungo della option_6'], [4, 5, 6]), $tab);
        $this->add(new ManyToOneRelation('FM2O', A::AF_LARGE | A::AF_SEARCHABLE, $this->getModule().'.m2o_node'), $tab);
        $this->add(new PasswordAttribute('PasswordAttribute', PasswordAttribute::AF_PASSWORD_NO_VALIDATE, true, ['minnumbers' => 2, 'minalphabeticchars' => 6]), $tab);
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
        $this->add(new TextAttribute('TextAttribute'), $tab);
        $this->add(new TimeAttribute('TimeAttribute'), $tab);
        $this->add(new TimeZoneAttribute('TimeZoneAttribute'), $tab);
        $this->add(new UpdatedByAttribute('UpdatedByAttribute'), $tab);
        $this->add(new UpdateStampAttribute('UpdateStampAttribute'), $tab);
        $this->add(new UrlAttribute('UrlAttribute'), $tab)->setPlaceholder('test placeholder UrlAttribute');
        $this->add(new WeekdayAttribute('WeekdayAttribute'), $tab);
        $this->add(new OneToOneRelation('OneToOneRelation', 0, $this->getModule().'.o2o_node', 'playground_id'), $tab);
        $this->add(new ShuttleRelation('ShuttleRelation', 0, $this->getModule().'.m2m_node', $this->getModule().'.m2o_node', 'playground_id', 'remotetable_id'), $tab);
    }
}
