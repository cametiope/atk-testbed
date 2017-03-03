<?php

namespace App\Modules\Testbed;

use Sintattica\Atk\Attributes\Attribute;

class EditableAttribute extends Attribute {
    public function display($record, $mode)
    {
        return $this->edit($record, '', $mode);
    }

    public function edit($record, $fieldprefix, $mode)
    {

        $attribute = $this->fieldName();
        $change = <<<EOF
var rl = jQuery(el).closest('tr').attr('id').split('_');
var uri = new YouAreI(rl_a[rl[0]][rl[1]]['edit']);

uri.query_set('atkaction', 'updateattributes');

var postdata = {};
postdata[el.name] = el.value;
jQuery
    .post(uri.to_string(),postdata)
    .done(function(data){
       ATK.DataGrid.update(rl[0], {}, {}, null);
    });
EOF;

        $this->addOnChangeHandler($change);
        return parent::edit($record, $fieldprefix, $mode);
    }
}