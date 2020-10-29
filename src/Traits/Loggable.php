<?php

namespace Vahidid\ModelLogger\Traits;

use Vahidid\ModelLogger\Helpers\EventHandler;
use Vahidid\ModelLogger\Helpers\Helper;
use Vahidid\ModelLogger\Models\LogModel;

trait Loggable
{
    private $helper;

    public function logs()
    {
        return $this->morphMany(LogModel::class, 'loggable');
    }

    public static function boot()
    {
        parent::boot();

        // CREATE LOG FOR MODEL
        self::created(function($model){
            $eventHandler = new EventHandler($model);
            $eventHandler->createdModelHandler();
        });

        // UPDATE LOG FOR MODEL
        self::updated(function ($model){
            $eventHandler = new EventHandler($model);
            $eventHandler->updatedModelHandler();
        });

        // DELETE LOG FOR MODEL
        self::deleted(function($model){
            $eventHandler = new EventHandler($model);
            $eventHandler->deleteModelHandler();
        });
    }
}
