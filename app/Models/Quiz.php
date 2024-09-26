<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $fillable = [
       
        'competition_id',
        'day',
        'title',  
        'type', 
        'answer',  
       

    ];  
    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
    public function questionType()
    {
        return $this->hasMany(QuestionType::class, 'question_id', 'id');
    }
    public function participantAanswer()
    {
        return $this->belongsTo(ParticipantAnswer::class);
    }
}
