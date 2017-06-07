<?php
/**
 * User: michele
 * Date: 30/05/17
 * Time: 17:37
 */

namespace App\Modules\Testbed;


use Sintattica\Atk\Relations\ManyToOneRelation;

class SmartM2O extends ManyToOneRelation
{
    public function db2value($rec)
    {
        $fieldName = $this->fieldName();
        if($rec[$fieldName]['id'] === null){

            $table = $this->getOwnerInstance()->getTable();
            $id = $rec['id'];

            $sql = "SELECT $fieldName FROM $table WHERE id = $id";
            $value = $this->getDb()->getValue($sql);
            return [
                'id' => $value,
            ];
        }



        return parent::db2value($rec);
    }


}