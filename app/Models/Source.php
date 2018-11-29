<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Source extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sources';
    public $timestamps = false;

    protected $fillable = [
        'status'
    ];

    public function toggleStatus(){
        $current = $this->status;
        $next = $current == 1 ? 0 : 1;
        $this->update(['status' => $next]);
    }
}
