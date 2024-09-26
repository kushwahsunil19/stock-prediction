<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegisterDate extends Model
{
    use HasFactory;
    protected $table = 'user_register_dates';
    protected $fillable = [
       
        'participant_id',
        'user_id',
        'reg_date',  

    ];  
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
