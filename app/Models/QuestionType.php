<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;
    protected $table = 'question_type';
    protected $fillable = [       
        'question_id',     
        'option_value',
       
    ];  
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'question_id', 'id');
    }
}
