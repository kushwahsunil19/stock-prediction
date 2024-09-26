<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantCompetition extends Model
{
    use HasFactory;
    protected $table = 'participant_competition';
    protected $fillable = [
        'competition_id',
        'participant_id',       
        'user_id',  
        'day',       
        'participant_date',    
        'answer_date',   
        'token_used',
        'selected_sprint_date'
    ];  
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id', 'id');
    }
    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function participantAnswers()
    {
        return $this->hasMany(ParticipantAnswer::class, 'com_participant_id', 'id');
    }
    
 
}
