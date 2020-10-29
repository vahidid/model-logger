Hi There !

simple package for log any model that you want in **Laravel** :)

This package save all log in Create,Update and Delete any instance of model that you want

for update you can see what field change from value to value :)

it's develop on Laravel 8.12.1

## Installation
you need to install first from composer

`composer install vahidid/model-logger`

and after that publish migrations file

`php artisan vendor:publish --tag=vahidid\model-logger\ModelLogerServiceProvider`

and it's installed :)

## How Work?
it's just a trait that you can to add in your target Laravel Model!
after that your logger it's work

Like this:

```
<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Model;

 use Vahidid\ModelLogger\Traits\Loggable;
 
 class Product extends Model
 {
     use Loggable;
 }
```

for get Log data from package you can work with Controller
(that it's under develop) 
or maybe you want to work with LogModel directly and access to log data :)

Use Controller and methods:
```
<?php

use Vahidid\ModelLogger\LogController;

$logController = new LogController();

//get logs by model namepace
$logController->getByModelNamespace(string $modelNamespace);

//get logs by model namespace and id
$logController->getByModelNamespaceAndId(string $modelNamespace, int $id);

//get all logs
$logController->getAllLogs();
```

for use LogModel directly just import it like this:
```
use Vahidid\ModelLogger\Models\LogModel;
```

LogModel is extends Model (from laravel Eloquent)

## Tnx
You can help me with contribute to improve the package :))

## Bug & Feature
Tell me any bug and so any feature in issues ;)
