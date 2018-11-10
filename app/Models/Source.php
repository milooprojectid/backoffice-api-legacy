<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Source extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sources';
}
