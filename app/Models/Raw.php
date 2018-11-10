<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Raw extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'raws';
}
