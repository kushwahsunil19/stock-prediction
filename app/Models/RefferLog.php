<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefferLog extends Model
{
    use HasFactory;
    protected $table = 'reffer_logs';
    protected $fillable = [
       
        'name',
        'email',
        'reffer_email',  
        'subject', 
       
    ];  
       public function user()
    {
        return $this->belongsTo(User::class, 'reffer_email', 'email');
    }
}
