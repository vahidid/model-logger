<?php
namespace Vahidid\ModelLogger\Helpers;

use Illuminate\Database\Eloquent\Model;

class Helper
{
    public static function getFieldsFromModel(array $fields){
        $keys = array_keys($fields);
        $resString = '';
        foreach ($keys as $i=>$key) {
            $resString .= $key;
            if ($i !== count($keys)-1) {
                $resString .= '|';
            }
        }
        return $resString;
    }

    public static function getValuesFromModel(array $values)
    {
        $fields = array_values($values);
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
