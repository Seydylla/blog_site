<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writers extends Model
{
    use HasFactory;
    protected $table = 'writers';

    //  We can say protected $guarded = [];
    protected $guarded = [];
    public $timestamps = false;
}
