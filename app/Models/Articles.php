<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';

    //  We can say protected $guarded = [];
    protected $guarded = [];
    public $timestamps = false;
}
