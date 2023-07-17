<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $table = 'days';

    public $fillable = [
        'name'
    ];

    public function octimes()
    {
        return $this->hasmany('App\Models\OCTime');
    }
}
