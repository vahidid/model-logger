<?php
namespace Vahidid\ModelLogger\Helpers;


use Illuminate\Database\Eloquent\Model;
use Vahidid\ModelLogger\Models\LogModel;

class EventHandler
{

    private $modelName;
    private $model;
    public function __construct(Model $model)
    {
        $reflection = new \ReflectionClass($model);
        $this->model = $model;
        $this->modelName = $reflection->getName();
    }

    public function createdModelHandler(): Model
    {
        $fields = Helper::getFieldsFromModel($this->model->getAttributes());
        $from = null;
        $to = Helper::getValuesFromModel($this->model->getAttributes());

        $newLog = LogModel::create([
            'loggable_type' => $this->modelName,
            'loggable_id' => $this->model->id,
            'event' => 'create',
            'fields' => $fields,
            'from' => $from,
            'to' => $to
        ]);
        return $this->model;
    }

    public function updatedModelHandler(): Model
    {
        $diffArrayFrom = array_diff($this->model->getOriginal(), $this->model->getAttributes());
        $diffArrayTo = array_diff($this->model->getAttributes(),$this->model->getOriginal());

        $fields = Helper::getFieldsFromModel($diffArrayFrom);
        $from = Helper::getValuesFromModel($diffArrayFrom);
        $to = Helper::getValuesFromModel($diffArrayTo);

        LogModel::create([
            'loggable_type' => $this->modelName,
            'loggable_id' => $this->model->id,
            'event' => 'update',
            'fields' => $fields,
            'from' => $from,
            'to' => $to
        ]);

        return $this->model;
    }

    public function deleteModelHandler()
    {
        LogModel::create([
            'loggable_type' => $this->modelName,
            'loggable_id' => $this->model->id,
            'event' => 'delete',
            'fields' => null,
            'from' => null,
            'to' => null
        ]);
    }


}
