<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'security_type_id',
        'symbol',
    ];

    public function securityType()
    {
        return $this->belongsTo(SecurityType::class);
    }

    public function securityPrice()
    {
        return $this->hasOne(SecurityPrice::class);
    }
}
