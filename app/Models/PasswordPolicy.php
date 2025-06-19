<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
    'min_length', 'require_uppercase', 'require_number', 'require_special',
    'alphanumeric', 'expiry_days', 'start_warning_days', 'max_login_attempts',
    'lockout_duration', 'use_otp', 'otp_expiry_duration', 'inactive_days',
    'session_lifetime', 'password_reuse_limit', 'max_partial_lockouts',
    'password_reuse_time_limit', 'password_reuse_time_period'
];

}
