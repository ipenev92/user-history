<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class codes extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'is_redeemed',
        'redeemed_by'
    ];
}
