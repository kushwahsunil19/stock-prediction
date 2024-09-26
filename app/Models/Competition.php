<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';
    protected $fillable = [
        'name',
        'startdate',  
        'enddate',       
        'sprint',  
        'token_no',  
        'token_expiry_date',  
        'rule_of_competition',  
        'summary',  
        'news_heading',

    ];  
    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
    public function participant()
    {
       return $this->hasMany(Participant::class);
    }
    
}
