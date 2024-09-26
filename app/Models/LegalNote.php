<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalNote extends Model
{
    use HasFactory;
    protected $table = 'legal_note';

    protected $fillable = [
        'title',
        'description',
    ];

}
