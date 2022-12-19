<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers extends Model {
    use SoftDeletes; // Allows restoring data easily.
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'generated'
    ];
}
