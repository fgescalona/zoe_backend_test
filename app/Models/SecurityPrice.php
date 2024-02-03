<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityPrice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'security_id',
        'last_price',
        'as_of_date',
    ];

    public function security()
    {
        return $this->belongsTo(Security::class);
    }
}
