<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Raw extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'raws';
    protected $fillable = ['status'];
    public $timestamps = false;

    // Constants
    private $statuses = [
        "new" => 10,
        "running" => 20,
        "completed" => 30
    ];
    // --

    // Local Scopes

    public function scopeNew($query){
        return $query->where('status', $this->statuses['new']);
    }

    public function scopeRunning($query){
        return $query->where('status', $this->statuses['running']);
    }

    public function scopeCompleted($query){
        return $query->where('status', $this->statuses['completed']);
    }

    // --

    // Public Method
    public function setRunning(){
        return $this->update(['status' => $this->statuses["running"]]);
    }

    public function setCompleted(){
        return $this->update(['status' => $this->statuses["completed"]]);
    }
    // --
}
