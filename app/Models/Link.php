<?php

namespace App\models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Link extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'links';
}
