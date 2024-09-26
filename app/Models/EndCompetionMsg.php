<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndCompetionMsg extends Model
{
    use HasFactory;
    
    protected $table = 'end_competition';

    protected $fillable = [
        'news_heading',
        'summary',
    ];

}
