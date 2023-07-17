<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OCTime extends Model
{
    use HasFactory;
    protected $table = 'o_c_time';

    public $fillable = [
        'outlet_id', 'day_id', 'open_time', 'close_time'
    ];

    public function days()
    {
        return $this->belongsTo('App\Models\Day', 'day_id');
    }
}
