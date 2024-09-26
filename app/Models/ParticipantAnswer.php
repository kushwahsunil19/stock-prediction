<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantAnswer extends Model
{
    use HasFactory;
    protected $table = 'participant_answer';
    protected $fillable = [
        'com_participant_id',
        'question_id',
        'p_answer', 
      
    ];  
    public function participantCompetion()
    {
        return $this->belongsTo(ParticipantCompetition::class, 'com_participant_id', 'id');
    }
    
    public function question()
    {
        return $this->belongsTo(Quiz::class, 'question_id', 'id');
    }
  
}
