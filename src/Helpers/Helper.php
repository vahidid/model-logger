<?php
namespace Vahidid\ModelLogger\Helpers;

use Illuminate\Database\Eloquent\Model;

class Helper
{
    public static function getFieldsFromModel(Model $model){
        $keys = array_keys($model->getAttributes());
        $resString = '';
        foreach ($keys as $i=>$key) {
            $resString .= $key;
            if ($i !== count($keys)-1) {
                $resString .= '|';
            }
        }
        return $resString;
    }

    public static function getValuesFromModel(Model $model)
    {
        $fields = array_values($model->getAttributes());
        $resString = '';

        foreach ($fields as $i=>$field){
            $resString .= $field;
            if ($i !== count($fields) - 1){
                $resString .= '|';
            }
        }

        return $resString;
    }
}
