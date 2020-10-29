<?php

namespace Vahidid\ModelLogger\Traits;

use Vahidid\ModelLogger\Helpers\Helper;
use Vahidid\ModelLogger\Models\LogModel;

trait Loggable
{
    private $helper;
    public function loggable()
    {
        return $this->morphTo('loggable');
    }

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $reflection = new \ReflectionClass($model);

            $fields = Helper::getFieldsFromModel($model);
            $from = null;
            $to = Helper::getValuesFromModel($model);

            $newLog = LogModel::create([
                'loggable_type' => $reflection->getName(),
                'loggable_id' => $model->id,
                'event' => 'create',
                'fields' => $fields,
                'from' => $from,
                'to' => $to
            ]);
            return $model;
        });
    }
}
