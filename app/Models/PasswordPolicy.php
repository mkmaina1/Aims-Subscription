<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_length',
        'require_uppercase',
        'require_number',
        'require_special',
    ];
}
