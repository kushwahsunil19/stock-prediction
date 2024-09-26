<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'accounts_profiles'; // Specify the table name

    protected $fillable = [
        'account_id',
        'file',
    ];

    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
