<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'participants';
    protected $fillable = [
        'competition_id',
        'user_id',
        'token',       
        'token_expiry_date',    
        'status',       
    ];  
    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function userRegisterDate()
    {
        return $this->hasMany(UserRegisterDate::class, 'participant_id', 'id');
    }
}
