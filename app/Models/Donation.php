<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'status'
    ];

    public function transactions()
    {
        return $this->hasMany(DonationTransaction::class);
    }
}
