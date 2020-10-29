<?php

namespace Vahidid\ModelLogger\Models;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'logs';
    protected $fillable = [
        'loggable_type', 'loggable_id', 'event', 'from', 'to', 'fields'
    ];

    public function loggable()
    {
        return $this->morphTo('loggable');
    }
}
