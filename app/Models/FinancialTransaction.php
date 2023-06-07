<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'financial_transactions';    

    protected $fillable = [
        'id',
        'user_id',
        'type',
        'description',
        'repeat',
        'repeatoken',
        'value',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
