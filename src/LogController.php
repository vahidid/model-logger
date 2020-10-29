<?php


namespace Vahidid\ModelLogger;


use Vahidid\ModelLogger\Models\LogModel;

class LogController
{

    // GET BY MODEL NAMESPACE
    public function getByModelNamespace(string $modelNamespace)
    {
        $logs = LogModel::query()
            ->where('loggable_type', $modelNamespace)
            ->get();

        return $logs;
    }

    // GET BY MODEL NAMESPACE AND ID
    public function getByModelNamepsaceAndId(string $modelNamespace, int $id)
    {
        $logs = LogModel::query()
            ->where('loggable_type', $modelNamespace)
            ->where('loggable_id', $id)
            ->get();

        return $logs;
    }

    // GET ALL LOGS
    public function getAllLogs()
    {
        return LogModel::all();
    }
}
