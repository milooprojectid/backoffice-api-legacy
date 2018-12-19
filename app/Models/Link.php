<?php

namespace App\Models;

use App\Events\JobDispatched;
use App\Jobs\CrawlJob;
use Jenssegers\Mongodb\Eloquent\Model as Model;

class Link extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['status'];

    // Constants
    private $statuses = [
        "new" => 10,
        "running" => 20,
        "completed" => 30,
        "invalid" => 35,
        "failed" => 40
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

    public function scopeDispatchable($query){
        return $query->where('status', '!=', $this->statuses['running'])->where('status', '!=', $this->statuses['completed']);
    }

    public function scopeOldest($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeSourceIsActive($query){
        return $query->whereHas('sourceRelation', function ($q){
           $q->where('status', 0);
        });
    }

    public function dispatch(){
        CrawlJob::dispatch($this)->onQueue('crawler');
        event(new JobDispatched('crawl', 1));
    }
    // --


    // Public Method
    public function setRunning(){
        return $this->update(['status' => $this->statuses["running"]]);
    }

    public function setCompleted(){
        return $this->update(['status' => $this->statuses["completed"]]);
    }

    public function setInvalid(){
        return $this->update(['status' => $this->statuses["invalid"]]);
    }

    public function setFailed(){
        return $this->update(['status' => $this->statuses["failed"]]);
    }
    // --

    // Relationship
    public function sourceRelation(){
        return $this->belongsTo(Source::class, 'source', 'alias');
    }
    // --
}
