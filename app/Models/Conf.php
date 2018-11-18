<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    protected $table = 'configurations';
    protected $fillable = ['key', 'value'];
    public $timestamps = false;

    public static function crawlerStatus()
    {
        return static::where('key', 'crawler')->where('value', '1')->first();
    }

    public static function scrapperStatus()
    {
        return static::where('key', 'scrapper')->where('value', '1')->first();
    }

    public static function crawlerJobLimit()
    {
        return static::where('key', 'crawler_max_job')->first();
    }

    public static function scrapperJobLimit()
    {
        return static::where('key', 'scrapper_max_job')->first();
    }
}
